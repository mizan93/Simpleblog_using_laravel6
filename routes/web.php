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
//     return view('pages.index');
// });
Route::get('/', 'PostController@index');
Route::get('contact/us', 'Test@contactus')->name('contact');
Route::get('about/us', 'Test@about')->name('about');
Route::get('Write/Post', 'PostController@writepost')->name('write.post');
Route::get('Add/Category', 'Test@addcategory')->name('addcategory');
Route::post('Store/Category', 'Test@storecategory')->name('store.category');
Route::get('Category/List', 'Test@CategoryList')->name('categorylist');
Route::get('view/category/{id}', 'Test@viewCategory');
Route::get('delete/category/{id}', 'Test@deleteCategory');
Route::get('edit/category/{id}', 'Test@EditCategory');
Route::post('update/category/{id}', 'Test@updateCategory');
Route::post('Store/Post', 'PostController@storePost')->name('store.post');
Route::get('All/Post', 'PostController@postList')->name('allpost');
Route::get('view/post/{id}', 'PostController@viewPost');
Route::get('edit/post/{id}', 'PostController@editPost');
Route::post('update/post/{id}', 'PostController@updatePost');
Route::get('delete/post/{id}', 'PostController@deletePost');
