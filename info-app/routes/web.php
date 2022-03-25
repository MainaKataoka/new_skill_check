<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoController;
use App\Models\Info;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [InfoController::class, 'index'])->name('info.index');

Route::post('/confirm', [InfoController::class, 'confirm'])->name('info.confirm');

// Route::post('/fix', [InfoController::class, 'fix'])->name('info.fix');

Route::post('process', [InfoController::class, 'process'])->name('process');

Route::get('/finish', [InfoController::class, 'finish'])->name('info.finish');