<?php

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

function getLocale()
{
    return LaravelLocalization::getCurrentLocale();
}

function getBoolean($value)
{
    if ($value) {
        return getLocale() == "ar" ? 'نعم' : 'Yes';
    } else {
        return getLocale() == "ar" ? 'لا' : 'No';
    }

}

function getOption($type, $code, $lang = null)
{
    $option = \App\Option::where('type', $type)->where('code', $code)->first();

    if ($lang)
        $value_var = 'text_' . $lang;
    else
        $value_var = 'text_' . getLocale();

    if ($option)
        return $option->$value_var;
    else
        return '';
}

function getItemAttributeValue($route, $item, $attribute)
{
    $booleans = ['active'];
    if (in_array($attribute, $booleans))
        return getBoolean($item->$attribute);

    $translated = ['name', 'title', 'body'];
    if (in_array($attribute, $translated)) {
        $attr = $attribute . '_' . getLocale();

        return $item->$attr;
    }


    switch ($route) {
        case "users" :
            switch ($attribute) {
                case "role":
                    return getOption("roles", $item->$attribute);
            }
            break;
        case "categories" :
            switch ($attribute) {
                case "products":
                    return $item->products()->count();
            }
            break;
        case "products" :
            switch ($attribute) {
                case "category":
                case "category_id":
                return is_null($item->category) ? trans('app.no category') : getTranslatedAttribute($item->category, "title");
            }
            break;
    }

    return $item->$attribute;
}

function getTranslatedAttribute($item, $attribute)
{
    $var = $attribute . "_" . app()->getLocale();
    return $item->$var;
}


function getAttributeType($attribute)
{
    switch ($attribute) {
        case 'email' :
            return 'email';
        default :
            return 'text';
    }
}

function getHasRelationAttributes($route, $relation)
{
    $route = substr($route, 0, -1);
    $model = "App\\" . ucfirst($route);

    if (class_exists($model)) {
        $item = new $model();
        $relation = $item->$relation();
        $related = get_class($relation->getRelated());
        $item = new $related();
        $attributesFiled = $route . 'Attributes';
        $attributes = $item->$attributesFiled;
    }

    return is_null($attributes) ? [] : $attributes;
}

function getSelectItems($route, $attribute)
{
    $data = [];
    switch ($route) {
        case 'products' :
            switch ($attribute) {
                case'category_id':
                    $data = \App\Category::get();
                    break;
            }
            break;
    }

    return $data;
}

function generateOrderOptions()
{
    $options = [];

    $collection = new \Illuminate\Database\Eloquent\Collection();
    for ($i = 0; $i < 10; $i++) {
        $collection->add(new \App\Option(['code' => $i, 'text_ar' => $i, 'text_en' => $i]));
    }

    return $options;
}

function getSelectOptions($route, $attribute)
{
    $options = [];

    if ($attribute == "active")
        return \App\Option::where('type', 'booleans')->get();

    switch ($route) {
        case 'users':
            switch ($attribute) {
                case'role':
                    $options = \App\Option::where('type', 'roles')->get();
                    break;
            }
            break;
        case 'slides' :
            switch ($attribute) {
                case'order':
                    $collection = new \Illuminate\Database\Eloquent\Collection();
                    for ($i = 1; $i <= 10; $i++) {
                        $collection->add(new \App\Option(['code' => $i, 'text_ar' => $i, 'text_en' => $i]));
                    }
                    $options = $collection;
                    break;
            }
            break;
        case 'contacts' :
            switch ($attribute) {
                case'type':
                    $options = \App\Option::where('type', 'contacts_types')->get();
                    break;
            }
            break;
        case 'products':
            switch ($attribute) {
                case'is_new':
                    $options = \App\Option::where('type', 'answers')->get();
                    break;
            }
            break;
        case 'socials' :
            switch ($attribute) {
                case'type':
                    $options = \App\Option::where('type', 'socials_types')->get();
                    break;
            }
            break;
    }

    return $options;
}

function getActionIcon($action)
{
    switch ($action) {
        case "approve" :
            return "checkmark-circle2";
        default :
            return "hash";
    }
}

function getIndexOperations($model, $request)
{
    return ["create"];
}

function getRouteParameters()
{
    $query_string = '?';
    if (request()->has('type'))
        $query_string .= 'type=' . request('type');
    if (request()->has('status'))
        $query_string .= '&status=' . request('status');
    if (request()->has('canceled'))
        $query_string .= '&canceled=' . request('canceled');

    return $query_string;
}

function getNotificationIcon($item)
{

    $notification = '<a href="';
    $notification .= route('notifications.show', $item->id);
    $notification .= '" class="btn bg-success-400 rounded-round btn-icon">';

    switch ($item->type) {
        default:
            $notification .= '<i class="icon-mention"></i>';
    }

    $notification .= '</a>';

    return $notification;
}

function getPlural($model)
{
    switch ($model) {
        case "address" :
            return "addresses";
        case "category" :
            return "categories";
        case "gallery" :
            return "galleries";
        default :
            return $model . "s";
    }
}

