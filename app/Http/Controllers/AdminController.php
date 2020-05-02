<?php

namespace App\Http\Controllers;


use App\PostImage;
use App\ProductImage;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    protected $model;
    protected $route;
    protected $title;

    protected $table_attributes = [];
    protected $attributes = [];
    protected $relations = [];
    protected $filters = [];
    protected $actions = [];

    protected $storeRequest = null;
    protected $updateRequest = null;

    protected $orderBy = 'created_at';

    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $query = $this->model->query();


        if ($this->model instanceof User) {
            $query->where('id', '!=', Auth::id());
        }

        $params = '';
        foreach (request()->all() as $var => $value) {
            if ($var == "query") {
                foreach ($this->attributes as $attribute => $type) {
                    if ($type == "text") {
                        $query->orWhere($attribute, 'like', '%' . $value . '%');
                    }
                }
            } else if ($var != "page") {
                $query->where($var, $value);
                $params .= '&' . $var . '=' . $value;
            }
        }

        $items = $query->orderBy($this->orderBy)->paginate(12);

        if (count($this->table_attributes) == 0)
            $this->table_attributes = $this->attributes;

        $operations = getIndexOperations($this->model, request());


        return view('layouts.index')->with([
            "title" => $this->title,
            "route" => $this->route,
            "attributes" => $this->table_attributes,
            "filters" => $this->filters,
            "actions" => $this->actions,
            "operations" => $operations,
            "items" => $items,
            'params' => $params
        ]);
    }

    public function create()
    {
        $data = [];

        foreach ($this->relations as $relation => $type) {

            $model = $this->model->$relation()->getRelated();
            $data[$relation] = $model::get();
        }

        $params = [];
        foreach (request()->all() as $var => $value) {
            $params[$var] = $value;
        }

        return view('layouts.create')->with([
            "title" => $this->title,
            "route" => $this->route,
            "attributes" => $this->attributes,
            "relations" => $this->relations,
            "data" => $data,
            "action" => "create",
            "params" => $params,
        ]);
    }

    public function store(Request $request)
    {
        if (!is_null($this->storeRequest)) {
            $this->validate($request, $this->storeRequest->rules(), $this->storeRequest->messages());
        }


        try {
            $item = $this->model;

            $except_inputs = [""];

            foreach ($this->relations as $relation => $type) {
                $except_inputs[] = $relation;
            }

            $item->fill($request->except($except_inputs));

            /*if ($request->has('location')) {
                $location = trim($request->location, '()');
                $location = explode(",", $location);
                $item->latitude = $location[0];
                $item->longitude = $location[1];
            }
*/
            if ($this->model instanceof User) {
                $item->password = Hash::make('123456');
            }

            $item->save();

            foreach ($this->relations as $relation => $type) {

                if ($type == "attachments") {
                    for ($i = 0; $i < count($request->images); $i++) {
                        $path = $request->file('images')[$i]->store(
                            $this->route, 'public'
                        );

                        /*if ($this->route == "products") {
                            $image = new ProductImage();
                            $image->product_id = $item->id;
                        } else if ($this->route == "posts") {
                            $image = new PostImage();
                            $image->post_id = $item->id;
                        }

                        $image->path = $path;
                        $image->save();
*/
                    }

                } else if ($type == 'has') {

                    $item->$relation()->sync($request->$relation);
                }
            }

            Session::flash('message', trans('app.success message', ['action' => trans('app.create')]));
            Session::flash('class', 'success');

            return redirect()->route($this->route . '.show', $item->id);

        } catch
        (\Exception $e) {
            dd($e);
            Session::flash('message', trans('app.error message', ['action' => trans('app.create')]));
            Session::flash('class', 'danger');

            return redirect()->back();
        }
    }

    public function show($id)
    {
        $item = $this->model->find($id);

        if ($item) {
            $attributes = $this->attributes;
            $attributes["created_at"] = 'timestamp';

            return view('layouts.show')->with([
                "title" => $this->title,
                "route" => $this->route,
                "attributes" => $attributes,
                "relations" => $this->relations,
                "action" => "show",
                "operations" => ["edit", "delete"],
                "item" => $item
            ]);
        } else {
            Session::flash('message', trans('app.error message', ['action' => trans('show')]));
            Session::flash('class', 'danger');

            return redirect()->route($this->route . '.index');
        }
    }

    public function edit($id)
    {
        $data = [];

        foreach ($this->relations as $relation => $type) {

            $model = $this->model->$relation()->getRelated();
            $data[$relation] = $model::get();
        }

        return view('layouts.edit')->with([
            "title" => $this->title,
            "route" => $this->route,
            "attributes" => $this->attributes,
            "relations" => $this->relations,
            "action" => "edit",
            "item" => $this->model->find($id),
            "data" => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        if (!is_null($this->updateRequest)) {
            $this->validate($request, $this->updateRequest->rules(), $this->updateRequest->messages());
        }

        try {
            $item = $this->model->find($id);
            $except_inputs = [""];

            foreach ($this->relations as $relation => $type) {
                $except_inputs[] = $relation;

                if ($type == "many")
                    $item->$relation()->sync($request->$relation);
            }

            $item->fill($request->except($except_inputs));


            /*if ($request->has('location')) {
                $location = trim($request->location, '()');
                $location = explode(",", $location);
                $item->latitude = $location[0];
                $item->longitude = $location[1];
            }
*/

            $item->update();


            Session::flash('message', trans('app.success message', ['action' => trans('update')]));
            Session::flash('class', 'success');

        } catch (\Exception $e) {


            Session::flash('message', trans('app.error message', ['action' => trans('update')]));
            Session::flash('class', 'danger');
        }

        return redirect()->route($this->route . '.show', $id);
    }

    public function destroy($id)
    {
        try {
            $this->model->find($id)->delete();


            Session::flash('message', trans('app.success message', ['action' => trans('app.delete')]));
            Session::flash('class', 'success');

        } catch (\Exception $e) {

            Session::flash('message', trans('app.error message', ['action' => trans('app.delete')]));
            Session::flash('class', 'danger');
        }

        return redirect()->route($this->route . '.index');
    }
}
