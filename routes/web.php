
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@index')->name('home');
Auth::routes();
Route::get('/cabinet', 'Cabinet\HomeController@index')->name('cabinet');

