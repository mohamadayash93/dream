<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

    //Front Routes
    Route::group([], function () {
        Route::get('/', 'FrontController@index')->name('front.home');
        Route::get('/menu', 'FrontController@menu')->name('front.menu');
        Route::get('/city', 'FrontController@city')->name('front.taif');
        Route::get('/contact', 'FrontController@contact')->name('front.contact');
        Route::get('/blog/{id}', 'FrontController@blog')->name('front.blog');
        Route::post('send', 'FrontController@sendContactMessage')->name('sendMsg');

    });

    //Admin Routes
    Route::group(['prefix' => 'admin'], function () {

        // Authentication Routes...
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\LoginController@login');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'Auth\RegisterController@register');


        Route::get('/', function () {
            return redirect('admin/login');
        });
        Route::get('/home', 'HomeController@home')->name('home');
        Route::get('/profile', 'HomeController@profile')->name('profile');
        Route::get('/preferences', 'HomeController@preferences')->name('preferences');


        Route::post('files/single', 'FileController@single')->name('files.single');
        Route::post('files/multiple', 'FileController@multiple')->name('files.multiple');
        //resources routes
        foreach (MODELS as $model) {
            Route::resource(getPlural($model), ucfirst($model) . 'Controller');
        }
    });
});


Auth::routes();

