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


// Authentication Routes...
        $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
        $this->post('login', 'Auth\LoginController@login');
        $this->post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        $this->post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
        $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        $this->post('password/reset', 'Auth\ResetPasswordController@reset');
    

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('auth.usuarios', function(){
// return view('welcome');
// })->middleware('guest') ;

Route::get('/users/{id}','UserController@show')->name('user');

Route::get('/buyers/{id}','BuyerController@show' )->name('buyer');
Route::get('/buyers/{id}/products','BuyerProductController@index')->name('buyer.product');
Route::get('/products/{id}','ProductController@show')->name('Producto.product');

// Route::get('/buyers/{id}', function($id)
//     {
//         $user = \App\Buyer::findOrFail($id);
//         return view('auth.buyer', compact('buyer'));
//     })->name('buyer');

//Route::get('/usuarios','User\UserController@index');
//Route::view('/usuario','auth.user');
//Route::resource('users','User\UserController')->name('usuario');

//Route::resource('users','User\UserController', ['except' => ['create', 'edit']]);


