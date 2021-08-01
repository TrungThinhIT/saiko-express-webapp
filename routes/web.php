<?php

use App\Http\Controllers\transactions\TransactionsController;
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
    Route::post('follow-tracking', 'FLTrackingController@getStatus')->name('getStatus');
    Route::get('createTracking', 'QuoteController@createTracking')->name('createTracking');
    Route::get('update-tracking', 'QuoteController@updateTracking')->name('updateTracking');
    Route::post('get-infor-box', 'FLTrackingController@getInforBox')->name('getInforBox');
});
Route::prefix('blogs')->namespace('blogs')->name('blog.')->group(function () {
    Route::get('/', 'BlogController@index')->name('index');
    Route::get('air-cargo', 'BlogController@air_cargo')->name('air_cargo');
    Route::get('air-transport', 'BlogController@air_transport')->name('air_transport');
    Route::get('terms', 'BlogController@terms')->name('terms');
    Route::get('ship-cosmetic', 'BlogController@cosmetic')->name('cosmetic');
    Route::get('electronic', 'BlogController@electronic')->name('electronic');
    Route::get('tracking', 'BlogController@tracking')->name('tracking');
    Route::get('cost-air', 'BlogController@cost_air')->name('cost-air');
    Route::get('function-food', 'BlogController@function_food')->name('function-food');
    Route::get('price-cosmetic', 'BlogController@price_cosmetic')->name('price-cosmetic');
    Route::get('best-price-supermarket', 'BlogController@supermarket')->name('supermarket');
});
Route::prefix('contacts')->namespace('contacts')->name('contact.')->group(function () {
    Route::get('/', 'ContactController@index')->name('index');
});
Route::get('api/password/reset/{token}', 'auth\AuthController@sendInfoResetPassword')->name('resetPassword');

Route::prefix('auth')->namespace('auth')->name('auth.')->group(function () {
    Route::get('index', 'AuthController@index')->name('index');
    Route::post('login', 'AuthController@login')->name('login');
    Route::get('logout', 'AuthController@logout')->middleware('cookie')->name('logout');
    Route::post('register', 'AuthController@register')->name('register');
    Route::post('sendLinkResetPassword', 'AuthController@sendLinkResetPassword')->name('sendLinkResetPassword');
    Route::get('me', 'AuthController@info')->middleware('cookie')->name('info');
    Route::put('update', 'AuthController@updateUser')->middleware('cookie')->name('updateUser');
    Route::post('reset-password', 'AuthController@resetPassword')->name('web.resetPassword');
});

Route::prefix('shipment')->middleware('cookie')->name('shipment.')->namespace('shipments')->group(function () {
    Route::resource('', 'ShipmentsController')->parameters([
        '' => 'shipment'
    ]);
    Route::get('list-address-book', 'ShipmentsController@listAddressBook')->name('machine.listAddress');
});

Route::prefix('transactions')->name('transaction.')->namespace('transactions')->group(function () {
    Route::resource('', 'TransactionsController')->parameters(['' => 'transaction']);
});

Route::prefix('orders')->middleware('cookie')->namespace('orders')->name('orders.')->group(function () {
    Route::resource('', 'OrdersController')->parameters(['' => 'order']);
    Route::get('follow/trackings', 'OrdersController@follow')->name('follow');
});

Route::prefix('Api')->namespace('api')->name('api')->group(function () {
    Route::get('create-tickit', 'appController@storeTickit')->name('storeTickit');
    Route::get('Ref', 'appController@allFunction')->name('getPrice');
    Route::post('Ref', 'appController@createTracking')->name('createTracking');
    Route::get('GetInfoTicket', 'appController@GetInfoTicket')->name('GetInfoTicket');
    Route::get('get-province', 'appController@getProvince')->name('getProvince'); //tinh thanh
    Route::get('get-districts', 'appController@getDistrict')->name('getDistrict');
    Route::get('get-wards', 'appController@getWard')->name('getWard');
    // Route::post('app/create-tracking', 'appController@allFunction')->name('appCreateTracking');
});
