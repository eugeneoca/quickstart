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

Route::get('/', "IndexController@index")->name("home");
Route::get('/home', "IndexController@index");

Route::get('/home/send', function(){
    return redirect("/");
});
Route::post('/home/sendrequest', "IndexController@sendrequest");
Route::post('/home/sendclientregistration', "IndexController@sendclientregistration");
Route::post('/home/sendappraiser', "IndexController@sendappraiser");

Route::get('/company', function () {
    return view('page.company');
});
Route::get('/products', function () {
    return view('page.products');
});
Route::get('/technology', function () {
    return view('page.technology');
});
Route::get('/advantages', function () {
    return view('page.advantages');
});
Route::get('/licenses', function () {
    return view('page.licenses');
});
Route::get('/contact', function () {
    return view('page.contact');
});
Route::get('/client', function () {
    return view('page.client');
});

Route::get('/clientsuccess',function(){
    return view('client-confirmation');
});

Route::get('/appraiser', function () {
    return view('page.appraiser');
});

Route::get('/appraisersuccess',function(){
    return view('appraiser-confirmation');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index');