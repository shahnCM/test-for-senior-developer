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
    return view('welcome');
});


Route::get('second-buyer-eloquent', 'SolutionController@secondBuyerEloquent');

Route::get('second-buyer-no-eloquent', 'SolutionController@secondBuyerNoEloquent');

Route::get('purchase-list-eloquent', 'SolutionController@purchaseListEloquent');

Route::get('purchase-list-no-eloquent', 'SolutionController@purchaseListNoEloquent');

Route::get('record-transfer', 'SolutionController@recordTransfer');

Route::get('define-callback-js', 'SolutionController@defineCallbackJs');

Route::get('sort-js', 'SolutionController@sortJs');

Route::get('foreach-js', 'SolutionController@foreachJs');

Route::get('filter-js', 'SolutionController@filterJs');

Route::get('map-js', 'SolutionController@mapJs');

Route::get('reduce-js', 'SolutionController@reduceJs');

Route::get('animation', 'SolutionController@animation');

Route::get('i-m-funny', 'SolutionController@imFunny');



