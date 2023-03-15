<?php

use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AjaxController;
use \App\Http\Controllers\UserController;

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

Route::get('/', [PageController::class, 'index'])->name('main-page');
Route::get('/my-requests', [PageController::class, 'my_requests'])->name('my-requests');
Route::get('/profile/{id}', [PageController::class, 'profile'])->name('profile');
Route::get('/request/{id}', [PageController::class, 'request'])->name('request');
Route::get('/reg-auth', [PageController::class, 'reg_auth'])->name('reg-auth');
Route::get('/games', [PageController::class, 'games'])->name('games');
Route::get('/all-requests', [PageController::class, 'all_requests'])->name('all-requests');
Route::get('/req-scroll', [AjaxController::class, 'endlessScrolling'])->name('scroll');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/add-request', [PageController::class, 'add_request'])->name('add-req')->middleware('customAuth');

Route::post('/signup', [UserController::class, 'signup'])->name('signup');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/addreq', [RequestController::class, 'add_req'])->name('add-req-post')->middleware('customAuth');
