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
    return redirect('/cartoon0');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/member', 'membersController@getmember');
// Route::get('/addgen', function () {
//     return view('gen_add');
// });
// Route::post('/add_gen', 'membersController@postGen');
// Route::get('/showgen', 'membersController@showgen');
////////////////////////////////////////////////////////////////////////
// Route::get('/add_product', 'ProductsController@getform');
// Route::post('/add', 'ProductsController@postform');
// Route::get('/showpro', 'ProductsController@showpro');
// Route::get('/prolist', 'ProductsController@prolist');
// Route::get('/edit{id}', 'ProductsController@getedit');
// Route::post('/update', 'ProductsController@updateform');
//////////////////////////////////////////////////////////////////////
Route::post('/password/resetpass', 'ResetPasswordController@resetpass');
Route::get('/cartoon{id}', 'CartoonController@getcartoon');
//Route::get('/cartoon{id}', 'CartoonController@getcartoon');
Route::post('/add_cartoon', 'CartoonController@post_cartoon');
Route::post('store', 'CartoonController@store');
Route::get('/chapter{id}', 'CartoonController@addchapter');
Route::post('addchap_save', 'CartoonController@addchap_save');
Route::get('/playcartoon{id}', 'CartoonController@playcartoon');
Route::get('/editchap{id}', 'CartoonController@editchap');
Route::post('editchap_save', 'CartoonController@editchap_save');
Route::get('/deletechap/{id}/{cartoon_id}', 'CartoonController@deletechap');
Route::get('/delete_toon/{id}/{cartoon_img}', 'CartoonController@delete_toon');
Route::get('/edit_toon{id}', 'CartoonController@edit_toon');
Route::post('save_cartoon', 'CartoonController@editcartoon_save');
Route::get('/adduser/{status}/{id}', 'CartoonController@adduser');
Route::post('status_save', 'CartoonController@status_save');
Route::get('delete_user{id}', 'CartoonController@delete_user');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
