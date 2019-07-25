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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index');


Auth::routes();


// If user is authenticated
Route::group( ['middleware' => 'auth' ], function()
{

    Route::get('/home', 'HomeController@index')->name('home');

    // PDF
    Route::get('pdf/accountability_form/{id}', 'AccountabilityFormsController@pdfview');


    Route::get('/movement_forms/{id}/create','MovementFormsController@create');
    // Route::get('/accountability_forms/{id}/edit','AccountabilityFormsController@edit');

    Route::resource('users', 'UsersController');
    Route::resource('equipment', 'EquipmentController');
    Route::resource('requests', 'RequestsController');
    Route::resource('accountability_forms', 'AccountabilityFormsController');
    Route::resource('movement_forms', 'MovementFormsController');
    Route::resource('brands', 'BrandsController');
    Route::resource('departments', 'DepartmentsController');

});