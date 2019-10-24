<?php
// use App\Http\Middleware\CheckRole;
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


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/masterlayout', function () {
    return view('master');
});

Route::get('/khongphaiadmin', function () {
    return view('khongphaiadmin');
})->name('khongphaiadmin');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin_page', function () {
    return view('admin.admin');
});

Route::group(['prefix'=>'user','as'=>'user.'], function(){
    Route::get('/shop', 'UserController@shop')->name('user_shop');
    Route::get('/addtocart/{id}', 'UserController@addtocart')->name('user_addtocart');
    Route::get('/list_cart', 'UserController@list_cart')->name('user_list_cart');
    Route::get('/edit_cart/{rowid}', 'UserController@dit_cart_cart')->name('user_edit_cart');
    Route::get('/remove_cart/{rowid}', 'UserController@user_remove_cart')->name('user_remove_cart');
    Route::get('/single_shop/{id}', 'UserController@single_shop')->name('user_single_shop');
    Route::get('/destroy_list_cart', 'UserController@destroy_list_cart')->name('user_destroy_list_cart');
    Route::get('/order_list_cart', 'UserController@user_order_list_cart')->name('user_order_list_cart');

    Route::get('/order', 'OrderController@index')->name('order_index');
    Route::get('/order/create', 'OrderController@create')->name('order_create');
    Route::post('/order/store', 'OrderController@store')->name('order_store');
    Route::get('/order/edit/{id}', 'OrderController@edit')->name('order_edit');
    Route::put('/order/update/{id}', 'OrderController@update')->name('order_update');
    Route::delete('/order/delete/{id}', 'OrderController@destroy')->name('order_delete');
});


Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
    Route::get('/category_product', 'Category_productController@index')->name('category_product_index')->middleware('checkrole');
    Route::get('/category_product/create', 'Category_productController@create')->name('category_product_create')->middleware('checkrole');
    Route::post('/category_product/store', 'Category_productController@store')->name('category_product_store')->middleware('checkrole');
    Route::get('/category_product/edit/{id}', 'Category_productController@edit')->name('category_product_edit')->middleware('checkrole');
    Route::put('/category_product/update/{id}', 'Category_productController@update')->name('category_product_update')->middleware('checkrole');
    Route::delete('/category_product/delete/{id}', 'Category_productController@destroy')->name('category_product_delete')->middleware('checkrole');
    Route::get('/category_product/uploadImage', 'Category_productController@uploadImage')->name('category_product_uploadImage')->middleware('checkrole');

    Route::get('/product', 'ProductController@index')->name('product_index')->middleware('checkrole');
    Route::get('/product/create', 'ProductController@create')->name('product_create')->middleware('checkrole');
    Route::post('/product/store', 'ProductController@store')->name('product_store')->middleware('checkrole');
    Route::get('/product/edit/{id}', 'ProductController@edit')->name('product_edit')->middleware('checkrole');
    Route::put('/product/update/{id}', 'ProductController@update')->name('product_update')->middleware('checkrole');
    Route::delete('/product/delete/{id}', 'ProductController@destroy')->name('product_delete')->middleware('checkrole');
    Route::post('/product/uploadimage', 'ProductController@uploadimage')->name('product_uploadimage')->middleware('checkrole');
    Route::post('/product/edit_image', 'ProductController@edit_image')->name('product_edit_image')->middleware('checkrole');
    Route::get('/product/delete_image/{id}', 'ProductController@delete_image')->name('product_edit_image')->middleware('checkrole');

    Route::get('/category_article', 'Category_articleController@index')->name('category_article_index');
    Route::get('/category_article/create', 'Category_articleController@create')->name('category_article_create');
    Route::post('/category_article/store', 'Category_articleController@store')->name('category_article_store');
    Route::get('/category_article/edit/{id}', 'Category_articleController@edit')->name('category_article_edit');
    Route::put('/category_article/update/{id}', 'Category_articleController@update')->name('category_article_update');
    Route::delete('/category_article/delete/{id}', 'Category_articleController@destroy')->name('category_article_delete');

    Route::get('/article', 'ArticleController@index')->name('article_index');
    Route::get('/article/create', 'ArticleController@create')->name('article_create');
    Route::post('/article/store', 'ArticleController@store')->name('article_store');
    Route::get('/article/edit/{id}', 'ArticleController@edit')->name('article_edit');
    Route::put('/article/update/{id}', 'ArticleController@update')->name('article_update');
    Route::delete('/article/delete/{id}', 'ArticleController@destroy')->name('article_delete');

    

});




Route::group(['prefix'=>'tan','as'=>'tan.'], function(){
    Route::get('/shop', 'TanController@shop')->name('tan_shop');
    Route::get('/chitiet/{id}', 'TanController@chitiet')->name('tan_chitiet');
    Route::get('/list_cart', 'TanController@list_cart')->name('tan_list_cart');
});