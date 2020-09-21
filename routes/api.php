<?php



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');

});


Route::resource('vehicles', 'VehicleController');

Route::resource('companies', 'CompanyController');

Route::resource('vehicle-models', 'VehicleModelController');
Route::get('vehicle-models/all/{id}', 'VehicleModelController@getModel');

Route::get('categories', 'VehicleController@category');

Route::get('vehicle-status', 'VehicleController@vehicleStatus');

Route::put('vehicles/expenses/{id}', 'VehicleController@vehicleExpenses');

Route::put('vehicles/insurance/{id}', 'VehicleController@vehicleInsurance');

Route::post('vehicles/search', 'VehicleController@search');

Route::get('vehicles/report', 'VehicleController@reports');

Route::get('vehicle-by-type/{type}', 'VehicleController@vehicleByType');

Route::get('vehicle-full-details', 'VehicleController@viewFullDetails');

Route::get('reports', 'VehicleController@reports');

Route::get('image/{filename}','VehicleController@image');

Route::resource('user', 'UserController');

Route::resource('photos','VehiclePhotosController');


Route::get('sync',  'VehicleController@sync'); 
