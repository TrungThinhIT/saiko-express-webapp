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

Route::get('/', function () {
    return view('index');
})->name('index');
Route::prefix('service')->namespace('Services')->name('service.')->group(function () {
    Route::get('sea', 'ServiceController@sea')->name('sea');
    Route::get('air', 'ServiceController@air')->name('air');
    Route::get('procedure', 'ServiceController@procedure')->name('procedure');
});
Route::prefix('about-us')->namespace('Abouts')->name('about.')->group(function () {
    Route::get('/', 'AboutController@index')->name('index');
    Route::get('details', 'AboutController@details')->name('details');
    Route::get('faqs', 'AboutController@faqs')->name('faqs');
    Route::get('policy', 'AboutController@policy')->name('policy');
    Route::get('gallery', 'AboutController@gallery')->name('gallery');
});
Route::prefix('request-tracking')->namespace('Request_Tracking')->name('rq_tk.')->group(function () {
    Route::get('price', 'RQ_TKController@price')->name('price');
    Route::get('quote', 'RQ_TKController@quote')->name('quote');
    Route::get('shipment', 'RQ_TKController@shipment')->name('shipment');
    Route::post('get-quanhuyen', 'RQ_TKController@quanhuyen')->name('quanhuyen');
    Route::post('get-phuongxa', 'RQ_TKController@phuongxa')->name('phuongxa');
    Route::post('quote', 'QuoteController@store')->name('store');
    Route::post('domestic-shipping', 'PriceController@getApiVNP')->name('getApiVNP');
});
Route::prefix('blogs')->namespace('blogs')->name('blog.')->group(function () {
    Route::get('/', 'blogController@index')->name('index');
    Route::get('air-cargo', 'blogController@air_cargo')->name('air_cargo');
    Route::get('air-transport', 'blogController@air_transport')->name('air_transport');
    Route::get('terms', 'blogController@terms')->name('terms');
    Route::get('ship-cosmetic', 'blogController@cosmetic')->name('cosmetic');
    Route::get('electronic', 'blogController@electronic')->name('electronic');
    Route::get('tracking', 'blogController@tracking')->name('tracking');
    ROute::get('cost-air', 'blogController@cost_air')->name('cost-air');
    Route::get('function-food', 'blogController@function_food')->name('function-food');
    Route::get('price-cosmetic', 'blogController@price_cosmetic')->name('price-cosmetic');
    Route::get('best-price-supermarket', 'blogController@supermarket')->name('supermarket');
});
Route::prefix('contacts')->namespace('contacts')->name('contact.')->group(function () {
    Route::get('/', 'ContactController@index')->name('index');
});
Route::prefix('auth')->namespace('Auth')->name('auth.')->group(function () {
    Route::get('index', 'AuthController@index')->name('index');
});
