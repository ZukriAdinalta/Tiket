<?php

use App\Http\Livewire\Backend\Concert;
use App\Http\Livewire\Backend\Dashboard;
use App\Http\Livewire\Backend\Order;
use App\Http\Livewire\Frontend\Home;
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

Route::get('/', Home::class)->name('home');

Route::get('/dashboard', Dashboard::class)->name('dashboard')->middleware('auth');
Route::get('/concert', Concert::class)->name('concert')->middleware('auth');
Route::get('/order', Order::class)->name('order')->middleware('auth');