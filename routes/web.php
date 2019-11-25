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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Admin
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});


//users
Route::group(['as' => 'user.', 'prefix' => 'user', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', 'UserController@index')->name('index');
    Route::get('create', 'UserController@create')->name('create');
    Route::post('store', 'UserController@store')->name('store');
    Route::get('edit/{id}', 'UserController@edit')->name('edit');
    Route::post('update/{id}', 'UserController@update')->name('update');
    Route::get('delete/{id}', 'UserController@delete')->name('delete');
});

//Departments
Route::group(['as' => 'department.', 'prefix' => 'department', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', 'DepartmentController@index')->name('index');
    Route::get('create', 'DepartmentController@create')->name('create');
    Route::post('store', 'DepartmentController@store')->name('store');
    Route::get('show/{id}', 'DepartmentController@show')->name('show');
    Route::get('edit/{id}', 'DepartmentController@edit')->name('edit');
    Route::post('update/{id}', 'DepartmentController@update')->name('update');
    Route::get('delete/{id}', 'DepartmentController@delete')->name('delete');
});

//Project
Route::group(['as' => 'project.', 'prefix' => 'project', 'middleware' => ['auth']], function () {
    Route::get('index', 'ProjectController@index')->name('index');
    Route::get('create', 'ProjectController@create')->name('create');
    Route::post('store', 'ProjectController@store')->name('store');
    Route::get('show/{id}', 'ProjectController@show')->name('show');
    Route::get('edit/{id}', 'ProjectController@edit')->name('edit');
    Route::post('update/{id}', 'ProjectController@update')->name('update');
    Route::get('delete/{id}', 'ProjectController@delete')->name('delete');
    Route::get('assign/form/{id}', 'ProjectController@assignForm')->name('assignForm');
    Route::post('assign/{id}', 'ProjectController@assign')->name('assign');
});

//Team
Route::group(['as' => 'team.', 'prefix' => 'team', 'middleware' => ['auth']], function () {
    Route::get('index', 'TeamController@index')->name('index');
    Route::get('create/{id}', 'TeamController@create')->name('create');
    Route::post('store', 'TeamController@store')->name('store');
    Route::get('show/{id}', 'TeamController@show')->name('show');
    Route::get('edit/{id}', 'TeamController@edit')->name('edit');
    Route::post('update/{id}', 'TeamController@update')->name('update');
    Route::get('delete/{id}', 'TeamController@delete')->name('delete');
    Route::get('assign/form/{id}', 'TeamController@assignForm')->name('assignForm');
    Route::post('assign/{id}', 'TeamController@assign')->name('assign');
});

//Profile
Route::group(['as' => 'profile.', 'prefix' => 'profile', 'middleware' => ['auth']], function () {
    Route::get('index/{id}', 'ProfileController@index')->name('index');
    Route::get('create', 'ProfileController@create')->name('create');
    Route::post('store/{id}', 'ProfileController@store')->name('store');
    Route::get('show/{id}', 'ProfileController@show')->name('show');
    Route::get('edit/{id}', 'ProfileController@edit')->name('edit');
    Route::post('update/{id}', 'ProfileController@update')->name('update');
    Route::get('delete/{id}', 'ProfileController@delete')->name('delete');
});

//Requirement
Route::group(['as' => 'requirement.', 'prefix' => 'requirement', 'middleware' => ['auth']], function () {
    Route::get('index', 'RequirementController@index')->name('index');
    Route::get('create/{id}', 'RequirementController@create')->name('create');
    Route::post('store/{id}', 'RequirementController@store')->name('store');
    Route::get('show/{id}', 'RequirementController@show')->name('show');
    Route::get('edit/{id}', 'RequirementController@edit')->name('edit');
    Route::post('update/{id}', 'RequirementController@update')->name('update');
    Route::get('delete/{id}', 'RequirementController@delete')->name('delete');
});
