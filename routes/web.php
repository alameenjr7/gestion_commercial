<?php

use Illuminate\Support\Facades\Auth;
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


// require __DIR__ . '/frontend.php';


require __DIR__ . '/backend.php';

require __DIR__ . '/seller.php';

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth:admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::post('currency_load',[\App\Http\Controllers\CurrencyController::class, 'currencyLoad'])->name('currency.load');

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Auth::routes(['register'=>false]);
