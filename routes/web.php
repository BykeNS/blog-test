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
Route::get('/chat',function(){
	return view('chat');
});

// Blog controller
Route::get('blog/{slug}','BlogController@getSingle')->name('blog.single')->where('slug','[\w\d\-\_]+');
Route::get('blog','BlogController@getIndex')->name('blog.index');

// Pages controller
Route::get('/','PagesController@getIndex');
Route::get('/about', 'PagesController@getAbout');
Route::post('/contact/store','PagesController@postContact');
Route::get('/contact','PagesController@getContact');
Route::get('/profile','PagesController@getprofile');
Route::post('/profile','PagesController@setprofile');
Route::get('/profile/{id}','ProfileController@show')->name('profile');
//Post controller

Route::resource('posts','PostController');

//Tag controller
Route::resource('tags','TagController');


// Auth

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Send mail
Route::get('mail', function () {

    $user = \App\User::find(1);
    Mail::to($user->email)->send(new \App\Mail\MyMail($user));

    dd("Email is Send.");

});
// Image upload
Route::get('image-upload',['as'=>'image.upload','uses'=>'ImageUploadController@imageUpload']);

Route::post('image-upload',['as'=>'image.upload.post','uses'=>'ImageUploadController@imageUploadPost']);

//Category 

Route::resource('category','CategoryController',['except' => ['create']]);

