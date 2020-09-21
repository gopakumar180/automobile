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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::post('/user', 'HomeController@register');

Route::get('api/user', function () {
    if(!Auth::check())
    {
        $user = App\User::find(1);
        Auth::login($user);
    }
    return Auth::user();
});

// Route::get('api/categories',  'CategoryController@index');
Route::post('api/store',  'CategoryController@store');
// Get specific Product
Route::get('api/categories/{id}','CategoryController@show');

// Delete a Product
Route::delete('api/categories/{id}','CategoryController@destroy');


//Route::get('/home', 'HomeController@index')->name('home');

/* Route::group(['prefix' => 'categories'], function()
{
    Route::get('/',  'HomeController@index')->name('home');
    Route::get('profile', 'HomeController@index')->name('home');

}); */
