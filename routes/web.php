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

use App\Http\Controllers\VendingMachineController;

Route::get('/', 'VendingMachineController@index')->name('index');
Route::post('/insert', 'VendingMachineController@insert')->name('deposit');
Route::post('/refund', 'VendingMachineController@refund')->name('refund');

Route::post('/set_merchandise', 'VendingMachineController@setMerchandise')->name('set_merchandise');
Route::post('/purchase', 'VendingMachineController@purchase')->name('purchase');
Route::post('/delete', 'VendingMachineController@delete')->name('delete');

Route::view('/login', 'login')->middleware('guest');
Route::post('/login', 'AuthController@login')->name('login');

Route::view('/register', 'register');
Route::post('/register', 'AuthController@register')->name('register');

Route::get('/logout', 'AuthController@logout')->name('logout');