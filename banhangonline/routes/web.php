<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/trangchu', 'FrontController@trangchu')->name('trangchu');
Route::get('/danhmuc', 'FrontController@danhmuc')->name('danhmuc');
Route::get('/danhmucsanpham', 'FrontController@danhmucsanpham')->name('danhmucsanpham');
Route::get('/sanpham', 'FrontController@sanpham')->name('sanpham');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'adminController@admin')->name('admin');

Route::middleware(['auth'])->group(function () {

    // modulle user
    Route::prefix('users')->group(function () {

        // Route::middleware(['checkacl:user-list'])->get('/', 'UserController@index')->name('user.index');
        // Route::middleware(['checkacl:user-add'])->get('/create', 'UserController@create')->name('user.add');
        // Route::middleware(['checkacl:user-add'])->post('/create', 'UserController@store')->name('user.store');
        // Route::middleware(['checkacl:user-edit'])->get('/edit/{id}', 'UserController@edit')->name('user.edit');
        // Route::middleware(['checkacl:user-edit'])->post('/edit/{id}', 'UserController@update')->name('user.edit');
        // Route::middleware(['checkacl:user-delete'])->get('/delete/{id}', 'UserController@delete')->name('user.delete');
    
        Route::get('/', 'UserController@index')->name('user.index');
        Route::get('/create', 'UserController@create')->name('user.add');
        Route::post('/create', 'UserController@store')->name('user.store');
        Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
        Route::post('/edit/{id}', 'UserController@update')->name('user.edit');
        Route::get('/delete/{id}', 'UserController@delete')->name('user.delete');
    });
    // module role
    Route::prefix('roles')->group(function () {
        // Route::middleware(['checkacl:role-list'])->get('/', 'RoleController@index')->name('role.index');
        // Route::middleware(['checkacl:role-add'])->get('/create', 'RoleController@create')->name('role.add');
        // Route::middleware(['checkacl:role-add'])->post('/create', 'RoleController@store')->name('role.store');
        // Route::middleware(['checkacl:role-edit'])->get('/edit/{id}', 'RoleController@edit')->name('role.edit');
        // Route::middleware(['checkacl:role-edit'])->post('/edit/{id}', 'RoleController@update')->name('role.edit');
        // Route::middleware(['checkacl:role-delete'])->get('/delete/{id}', 'RoleController@delete')->name('role.delete');
        
        Route::get('/', 'RoleController@index')->name('role.index');
        Route::get('/create', 'RoleController@create')->name('role.add');
        Route::post('/create', 'RoleController@store')->name('role.store');
        Route::get('/edit/{id}', 'RoleController@edit')->name('role.edit');
        Route::post('/edit/{id}', 'RoleController@update')->name('role.edit');
        Route::get('/delete/{id}', 'RoleController@delete')->name('role.delete');
    });

});