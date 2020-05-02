<?php

namespace App\Http\Controllers;


use App\Address;
use App\Blog;
use App\Client;
use App\Contact;
use App\Form;
use App\Partner;
use App\Post;
use App\Product;
use App\Category;
use App\Project;
use App\Service;
use App\Slide;
use App\Social;
use App\User;
use App\Vendor;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use stdClass;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['welcome']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function home()
    {
        $colors = ["success", "indigo", "danger", "blue", "warning", "info"];
        $data["statistics"] = new Collection();

        switch (Auth::user()->role) {
            case "admin" :
                $statistic = new StdClass();
                $statistic->name = trans('statistics.users');
                $statistic->icon = "users4";
                $statistic->color = $colors[array_rand($colors)];
                $statistic->value = User::count();

                $data["statistics"]->push($statistic);

               /* $statistic = new StdClass();
                $statistic->name = trans('statistics.forms');
                $statistic->icon = "comment-discussion";
                $statistic->color = $colors[array_rand($colors)];
                $statistic->value = Form::count();

                $data["statistics"]->push($statistic);
*/

                $statistic = new StdClass();
                $statistic->name = trans('statistics.products');
                $statistic->icon = "stack";
                $statistic->color = $colors[array_rand($colors)];
                $statistic->value = Product::count();

                $data["statistics"]->push($statistic);


                $statistic = new StdClass();
                $statistic->name = trans('statistics.categories');
                $statistic->icon = "stack2";
                $statistic->color = $colors[array_rand($colors)];
                $statistic->value = Category::count();

                $data["statistics"]->push($statistic);

                $statistic = new StdClass();
                $statistic->name = trans('statistics.posts');
                $statistic->icon = "blog";
                $statistic->color = $colors[array_rand($colors)];
                $statistic->value = Blog::count();

                $data["statistics"]->push($statistic);

                $statistic = new StdClass();
                $statistic->name = trans('statistics.partners');
                $statistic->icon = "handshake-o";
                $statistic->color = $colors[array_rand($colors)];
                $statistic->value = Partner::count();

                $data["statistics"]->push($statistic);

                break;
            default:
                break;
        }

        return view('home.index', compact('data'));
    }

    public function profile()
    {
        $attributes = [
            "image" => "image",
            "name" => "text",
            "password" => "password",
            "email" => "email",
            "mobile" => "text"
        ];
        $route = "users";

        return view('profile')->with(['attributes' => $attributes, 'route' => $route, 'action' => [], 'item' => Auth::user()]);

    }

    public function welcome()
    {
        return view('welcome');
    }
}
