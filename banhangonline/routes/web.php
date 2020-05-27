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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'FrontController@index')->name('customer.index');
Route::get('/useritem/{id}', 'FrontController@item')->name('customer.item');
Route::get('/allcategory', 'FrontController@allcategory')->name('customer.allcategory');
Route::get('/allcombo', 'FrontController@allcombo')->name('customer.allcombo');
Route::get('/subcombo/{id}', 'FrontController@subcombo')->name('customer.subcombo');
Route::get('/user-category/{id}', 'FrontController@category')->name('customer.category');
Route::get('/user-subcategory/{id}/{s_id}', 'FrontController@subcategory')->name('customer.subcategory');
Route::get('/checkout', 'FrontController@checkout')->name('customer.checkout');

Route::get('/customer_login', 'FrontController@login')->name('customer.login');
Route::post('/customer_login', 'CustomerController@postLogin')->name('customer.postLogin');

Route::get('/customer_login_order', 'FrontController@getLoginOrder')->name('customer.getLoginOrder');
Route::post('/customer_login_order', 'CustomerController@postLoginOrder')->name('customer.postLoginOrder');

Route::get('/customer_register', 'FrontController@register')->name('customer.register');
Route::post('/customer_register', 'CustomerController@store')->name('customer.store');

Route::get('/customer_update', 'CustomerController@edit')->name('customer.edit');
Route::post('/customer_update', 'CustomerController@update')->name('customer.update');

Route::get('/changePassword', 'CustomerController@changePassword')->name('customer.changePassword');
Route::post('/changePassword', 'CustomerController@updatePassword')->name('customer.updatePassword');

Route::post('/postOrder', 'CustomerController@postOrder')->name('customer.postOrder');

Route::get('/cart', 'CartController@index')->name('cart_index');

Route::get('/Add_to_cart', 'CartController@Add_to_cart')->name('Add_to_cart');
Route::get('/Remove_item', 'CartController@Remove_item')->name('Remove_item');
Route::get('/UpdateAmount', 'CartController@UpdateAmount')->name('UpdateAmount');
Route::get('clear', 'CartController@clear')->name('clear');

// Route::get('add-to-cart/{id}',[
//     "as"=>'them-gio-hang',
//     "uses"=>'itemController@getAddToCart'
// ]);
// Route::get('orderNow/{id}',[
//     "as"=>'them-gio-hang',
//     "uses"=>'itemController@orderNow'
// ]);
// Route::get('del-cart/{id}',[
//     "as"=>'xoa-gio-hang',
//     "uses"=>'itemController@getDelItemCart'
// ]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'adminController@admin')->name('admin');

Route::post('/loginAdmin', 'CustomerController@adminpostLogin')->name('login');



Route::middleware(['auth'])->group(function () {

    // modulle category
    Route::prefix('comboitem')->group(function () {

        // Route::middleware(['checkacl:user-list'])->get('/', 'UserController@index')->name('user.index');
        // Route::middleware(['checkacl:user-add'])->get('/create', 'UserController@create')->name('user.add');
        // Route::middleware(['checkacl:user-add'])->post('/create', 'UserController@store')->name('user.store');
        // Route::middleware(['checkacl:user-edit'])->get('/edit/{id}', 'UserController@edit')->name('user.edit');
        // Route::middleware(['checkacl:user-edit'])->post('/edit/{id}', 'UserController@update')->name('user.edit');
        // Route::middleware(['checkacl:user-delete'])->get('/delete/{id}', 'UserController@delete')->name('user.delete');
    
        Route::get('/', 'comboitemController@index')->name('comboitem.index');
        Route::get('/create', 'comboitemController@create')->name('comboitem.add');
        Route::post('/create', 'comboitemController@store')->name('comboitem.store');
        Route::get('/edit/{id}', 'comboitemController@edit')->name('comboitem.edit');
        Route::post('/edit/{id}', 'comboitemController@update')->name('comboitem.edit');
        Route::get('/delete/{id}', 'comboitemController@delete')->name('comboitem.delete');
    });


    // modulle warehouse
    Route::prefix('warehouse')->group(function () {

        // Route::middleware(['checkacl:user-list'])->get('/', 'UserController@index')->name('user.index');
        // Route::middleware(['checkacl:user-add'])->get('/create', 'UserController@create')->name('user.add');
        // Route::middleware(['checkacl:user-add'])->post('/create', 'UserController@store')->name('user.store');
        // Route::middleware(['checkacl:user-edit'])->get('/edit/{id}', 'UserController@edit')->name('user.edit');
        // Route::middleware(['checkacl:user-edit'])->post('/edit/{id}', 'UserController@update')->name('user.edit');
        // Route::middleware(['checkacl:user-delete'])->get('/delete/{id}', 'UserController@delete')->name('user.delete');
    
        Route::get('/', 'WarehouseController@index')->name('warehouse.index');
        Route::get('/create', 'WarehouseController@create')->name('warehouse.add');
        Route::post('/create', 'WarehouseController@store')->name('warehouse.store');
        Route::get('getWarehouse', 'WarehouseController@getWarehouse')->name('item.getWarehouse');
    });

    // modulle item
    Route::prefix('item')->group(function () {

        // Route::middleware(['checkacl:item-list'])->get('/', 'ItemController@index')->name('item.index');
        // Route::middleware(['checkacl:item-add'])->get('/create', 'ItemController@create')->name('item.add');
        // Route::middleware(['checkacl:item-add'])->post('/create', 'ItemController@store')->name('item.store');
        // Route::middleware(['checkacl:item-edit'])->get('/edit/{id}', 'ItemController@edit')->name('item.edit');
        // Route::middleware(['checkacl:item-edit'])->post('/edit/{id}', 'ItemController@update')->name('item.edit');
        // Route::middleware(['checkacl:item-delete'])->get('/delete/{id}', 'ItemController@delete')->name('item.delete');
    
        Route::get('/', 'ItemController@index')->name('item.index');
        Route::get('/create', 'ItemController@create')->name('item.add');
        Route::post('/create', 'ItemController@store')->name('item.store');
        Route::get('/edit/{id}', 'ItemController@edit')->name('item.edit');
        Route::post('/edit/{id}', 'ItemController@update')->name('item.edit');
        Route::get('/delete/{id}', 'ItemController@delete')->name('item.delete');
        Route::get('getItem', 'ItemController@getItem')->name('item.getItem');
        Route::get('getSubcategory', 'ItemController@getSubcategory')->name('item.getSubcategory');
    });
    
    // modulle gallery
    Route::prefix('gallery')->group(function () {

        // Route::middleware(['checkacl:user-list'])->get('/', 'UserController@index')->name('user.index');
        // Route::middleware(['checkacl:user-add'])->get('/create', 'UserController@create')->name('user.add');
        // Route::middleware(['checkacl:user-add'])->post('/create', 'UserController@store')->name('user.store');
        // Route::middleware(['checkacl:user-edit'])->get('/edit/{id}', 'UserController@edit')->name('user.edit');
        // Route::middleware(['checkacl:user-edit'])->post('/edit/{id}', 'UserController@update')->name('user.edit');
        // Route::middleware(['checkacl:user-delete'])->get('/delete/{id}', 'UserController@delete')->name('user.delete');
    
        Route::get('/', 'GalleryController@index')->name('gallery.index');
        Route::get('/create', 'GalleryController@create')->name('gallery.add');
        Route::post('/create', 'GalleryController@store')->name('gallery.store');
        // Route::get('/edit/{id}', 'ItemController@edit')->name('item.edit');
        // Route::post('/edit/{id}', 'ItemController@update')->name('item.edit');
        // Route::get('/delete/{id}', 'ItemController@delete')->name('item.delete');
        Route::get('getLibrary', 'GalleryController@getLibrary')->name('discount.getLibrary');
    });
    
    // modulle category
    Route::prefix('category')->group(function () {

        // Route::middleware(['checkacl:user-list'])->get('/', 'UserController@index')->name('user.index');
        // Route::middleware(['checkacl:user-add'])->get('/create', 'UserController@create')->name('user.add');
        // Route::middleware(['checkacl:user-add'])->post('/create', 'UserController@store')->name('user.store');
        // Route::middleware(['checkacl:user-edit'])->get('/edit/{id}', 'UserController@edit')->name('user.edit');
        // Route::middleware(['checkacl:user-edit'])->post('/edit/{id}', 'UserController@update')->name('user.edit');
        // Route::middleware(['checkacl:user-delete'])->get('/delete/{id}', 'UserController@delete')->name('user.delete');
    
        Route::get('/', 'CategoryController@index')->name('category.index');
        Route::get('/create', 'CategoryController@create')->name('category.add');
        Route::post('/create', 'CategoryController@store')->name('category.store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::post('/edit/{id}', 'CategoryController@update')->name('category.edit');
        Route::get('/delete/{id}', 'CategoryController@delete')->name('category.delete');
    });

    // modulle category
    Route::prefix('sub_category')->group(function () {

        // Route::middleware(['checkacl:user-list'])->get('/', 'UserController@index')->name('user.index');
        // Route::middleware(['checkacl:user-add'])->get('/create', 'UserController@create')->name('user.add');
        // Route::middleware(['checkacl:user-add'])->post('/create', 'UserController@store')->name('user.store');
        // Route::middleware(['checkacl:user-edit'])->get('/edit/{id}', 'UserController@edit')->name('user.edit');
        // Route::middleware(['checkacl:user-edit'])->post('/edit/{id}', 'UserController@update')->name('user.edit');
        // Route::middleware(['checkacl:user-delete'])->get('/delete/{id}', 'UserController@delete')->name('user.delete');
    
        Route::get('/{c_id}', 'sub_categoryController@index')->name('sub_category.index');
        Route::get('/{c_id}/create', 'sub_categoryController@create')->name('sub_category.add');
        Route::post('/create', 'sub_categoryController@store')->name('sub_category.store');
        Route::get('/{c_id}/edit/{id}', 'sub_categoryController@edit')->name('sub_category.edit');
        Route::post('/{c_id}/edit/{id}', 'sub_categoryController@update')->name('sub_category.edit');
        Route::get('/{c_id}/delete/{id}', 'sub_categoryController@delete')->name('sub_category.delete');
    });

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