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



Route::get('/clear', function() {
    $exitCode = Artisan::call('config:clear');
    return "config clear";
});

//Route::get('/generate_pdf', 'PDFController@generatePDF');
//
//Route::resource('/products', 'ProductController');
//
//
//Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-old_users')->group(function(){
//
//		Route::resource('/old_users', 'UsersController', ['except' => ['create', 'show', 'store']]);
//
//
//});


Route::group( ['prefix' => 'admin', 'middleware'=>'auth'],function (){

    Route::get('/home', [ 'uses'=>'HomeController@index', 'as'=>'home']);

    Route::get('/posts', [ 'uses'=>'PostsController@index', 'as'=>'post.index']);
    Route::get('/post/create', [ 'uses'=>'PostsController@create', 'as'=>'post.create']);
    Route::post('/post/store', [ 'uses'=>'PostsController@store', 'as'=>'post.store']);
    Route::get('/post/edit/{post}', [ 'uses'=>'PostsController@edit', 'as'=>'post.edit']);
    Route::post('/post/update/{post}', [ 'uses'=>'PostsController@update', 'as'=>'post.update']);
    Route::get('/post/delete/{post}', [ 'uses'=>'PostsController@destroy', 'as'=>'post.delete']);
    Route::get('/posts/trashed', [ 'uses' => 'PostsController@trashed', 'as' => 'post.trashed']);
    Route::get('/posts/kill/{id}', ['uses' => 'PostsController@kill', 'as' => 'post.kill']);
    Route::get('/posts/restore/{id}', ['uses' => 'PostsController@restore', 'as' => 'post.restore']);





    Route::get('/categories', [ 'uses'=>'CategoriesController@index', 'as'=>'category.index']);
    Route::get('/category/create', [ 'uses'=>'CategoriesController@create', 'as'=>'category.create']);
    Route::post('/category/store', [ 'uses'=>'CategoriesController@store', 'as'=>'category.store']);
    Route::get('/category/edit/{category}', [ 'uses'=>'CategoriesController@edit', 'as'=>'category.edit']);
    Route::post('/category/update/{category}', [ 'uses'=>'CategoriesController@update', 'as'=>'category.update']);
    Route::get('/category/delete/{category}', [ 'uses'=>'CategoriesController@destroy', 'as'=>'category.delete']);

    Route::get('/tags', [ 'uses'=>'TagsController@index', 'as'=>'tag.index']);
    Route::get('/tag/create', [ 'uses'=>'TagsController@create', 'as'=>'tag.create']);
    Route::post('/tag/store', [ 'uses'=>'TagsController@store', 'as'=>'tag.store']);
    Route::get('/tag/edit/{tag}', [ 'uses'=>'TagsController@edit', 'as'=>'tag.edit']);
    Route::post('/tag/update/{tag}', [ 'uses'=>'TagsController@update', 'as'=>'tag.update']);
    Route::get('/tag/delete/{tag}', [ 'uses'=>'TagsController@destroy', 'as'=>'tag.delete']);

    Route::get('/users', [ 'uses'=>'UsersController@index', 'as'=>'user.index']);
    Route::get('/user/create', [ 'uses'=>'UsersController@create', 'as'=>'user.create']);
    Route::post('/user/store', ['uses'=> 'UsersController@store', 'as'=> 'user.store']);
    Route::get('user/delete/{user}', ['uses'=> 'UsersController@destroy', 'as' => 'user.delete']);

    Route::get('/user/admin/{user}', [ 'uses'=>'UsersController@admin', 'as'=>'user.admin']);
    Route::get('/user/not-admin/{user}', [ 'uses'=>'UsersController@not_admin', 'as'=>'user.not.admin']);

    Route::get('user/profile', ['uses'=> 'ProfilesController@index', 'as' => 'user.profile']);
    Route::post('user/profile/update', ['uses'=> 'ProfilesController@update', 'as' => 'user.profile.update']);


});




