<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'Frontend\MainController@indexAction')->name('frontend-main');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ProductsController@index')->name('products');

Route::get('/', 'CategoriesController@show')->name('category');

Route::get('/product/{url}', 'Frontend\ProductController@showAction')->name('frontend-product');

Route::get('/Backend', 'Backend\MainController@indexAction')->name('backend-main');

