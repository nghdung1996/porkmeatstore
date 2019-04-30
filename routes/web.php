<?php

Route::get('/', 'PagesController@home')->name('home');
// Social Login
Route::get('redirect/{social}', 'SocialController@redirect');
Route::get('callback/{social}', 'SocialController@callback');

// Like
Route::get('like/create', 'LikesController@create');
Route::get('like/destroy', 'LikesController@destroy');

//Comment
Route::get('comment/create', 'CommentsController@create');
Route::get('comment/destroy/{id}', 'CommentsController@destroy');


// Ajax
Route::get('headercart', 'CartController@add_cart');

// Search
Route::post('searchproduct', 'ProductsController@search');

// Order
Route::get('orderslist', 'OrderController@list');
Route::get('deleteorder/{id}', 'OrderController@deleteorder');

// Feedback
Route::get('feedback', 'FeedbackController@new');
Route::post('feedback', 'FeedbackController@createfeedback');

//
Route::get('deliciousdishes', 'PagesController@deliciousdishes');

Route::get('posts/{id}/show', 'PostsController@show');

Route::get('likedproducts', 'ProductsController@likedProducts');\

Route::get('aboutus', 'PagesController@aboutus');
Route::get('cookeddishes', 'PagesController@cookeddishes');

Route::get('home','PagesController@home')->name('home');
Route::get('detailproduct', 'PagesController@detailproduct');
Route::get('products', 'PagesController@products');
Route::get('products/{id}/show', 'ProductsController@show');
Route::get('signup', 'UsersController@signup');
Route::post('signup', 'UsersController@postsignup');
Route::get('login', 'UsersController@login');
Route::post('login', 'UsersController@postlogin');
Route::get('logout', 'UsersController@logout');

Route::get('cart', 'ProductsController@cart');
Route::get('multiple-add-to-cart', 'ProductsController@multiple_add_to_cart');
Route::patch('update-cart', 'ProductsController@update_cart');
Route::delete('remove-from-cart', 'ProductsController@remove_from_cart');
Route::get('checkout', 'OrderController@new');
Route::post('checkout', 'OrderController@create');

Route::get('fetch_data', 'CommentsController@fetch_data');


Route::group(['prefix' => 'users', 'middleware' => 'authenticateuser'], function () {
  Route::get('edit/{id}', 'UsersController@edit');
  Route::post('update/{id}', 'UsersController@update');
});

Route::group(['prefix'=> 'admin', 'middleware' => 'adminLogin'], function(){

  Route::group( ['prefix' => 'user'], function(){
    Route::get('index', 'admin\UserController@index');
    Route::get('new', 'admin\UserController@newuser');
    Route::post('create', 'admin\UserController@create');
    Route::get('edit/{id}', 'admin\UserController@edit');
    Route::post('update/{id}', 'admin\UserController@update');
    Route::get('delete/{id}', 'admin\UserController@delete');
  });

  Route::group( ['prefix' => 'product'], function(){
    Route::get('index', 'admin\ProductController@index');
    Route::get('new', 'admin\ProductController@newproduct');
    Route::post('create', 'admin\ProductController@create');
    Route::get('edit/{id}', 'admin\ProductController@edit');
    Route::post('update/{id}', 'admin\ProductController@update');
    Route::get('delete/{id}', 'admin\ProductController@delete');
  });

  Route::group( ['prefix' => 'order'], function(){
    Route::get('index', 'admin\OrderController@index');
    Route::get('editorder/{id}', 'admin\OrderController@editorder');
    Route::post('posteditorder', 'admin\OrderController@posteditorder');
    Route::get('delete/{id}', 'admin\OrderController@delete');
  });

  Route::group( ['prefix' => 'posts'], function(){
    Route::get('index', 'admin\PostsController@index');
    Route::get('new', 'admin\PostsController@new');
    Route::post('create', 'admin\PostsController@create');
    Route::get('edit/{id}', 'admin\PostsController@edit');
    Route::post('update/{id}', 'admin\PostsController@update');
    Route::get('delete/{id}', 'admin\PostsController@delete');
    Route::get('editstatus/{id}', 'admin\PostsController@editstatus');
    Route::post('updatestatus', 'admin\PostsController@updatestatus');
  });


  Route::get('home', 'admin\AdminController@home');
});
Route::get('admin/login', 'admin\AdminController@login');
Route::post('admin/login', 'admin\AdminController@postlogin');
Route::get('admin/logout', 'admin\AdminController@logout');


// Quan ly

Route::group(['prefix'=> 'quanly', 'middleware' => 'quanlyLogin'], function(){

  Route::group( ['prefix' => 'product'], function(){
    Route::get('index', 'quanly\ProductController@index');
    Route::get('new', 'quanly\ProductController@newproduct');
    Route::post('create', 'quanly\ProductController@create');
    Route::get('edit/{id}', 'quanly\ProductController@edit');
    Route::post('update/{id}', 'quanly\ProductController@update');
    Route::get('delete/{id}', 'quanly\ProductController@delete');
  });

  Route::group( ['prefix' => 'order'], function(){
    Route::get('index', 'quanly\OrderController@index');
    Route::get('editorder/{id}', 'quanly\OrderController@editorder');
    Route::post('posteditorder', 'quanly\OrderController@posteditorder');
    Route::get('delete/{id}', 'quanly\OrderController@delete');
  });

  Route::group( ['prefix' => 'posts'], function(){
    Route::get('index', 'quanly\PostsController@index');
    Route::get('new', 'quanly\PostsController@new');
    Route::post('create', 'quanly\PostsController@create');
    Route::get('edit/{id}', 'quanly\PostsController@edit');
    Route::post('update/{id}', 'quanly\PostsController@update');
    Route::get('delete/{id}', 'quanly\PostsController@delete');
  });


  Route::get('home', 'quanly\QuanlyController@home');
});
Route::get('quanly/login', 'quanly\QuanlyController@login');
Route::post('quanly/login', 'quanly\QuanlyController@postlogin');
Route::get('quanly/logout', 'quanly\QuanlyController@logout');



// Authentication Routes...
Route::get('login', 'UsersController@login')->name('login');
Route::post('login', 'UsersController@postlogin');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

