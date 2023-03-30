<?php

use App\Http\Controllers\ChatController;
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

Route::get('/', [PageController::class, 'index'])->name('main-page')->middleware('reboot');
Route::get('/my-requests', [PageController::class, 'my_requests'])->name('my-requests')->middleware('customAuth');
Route::get('/profile/{id}', [PageController::class, 'profile'])->name('profile');
Route::get('/request/{id}', [PageController::class, 'request'])->name('request');
Route::get('/reg-auth', [PageController::class, 'reg_auth'])->name('reg-auth');
Route::get('/games', [PageController::class, 'games'])->name('games');
Route::get('/all-requests', [PageController::class, 'all_requests'])->name('all-requests');
Route::get('/req-scroll', [AjaxController::class, 'endlessScrolling'])->name('scroll');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/add-request', [PageController::class, 'add_request'])->name('add-req')->middleware('customAuth', 'userStatus');
Route::get('/game-requests/{id}', [PageController::class, 'game_reqs'])->name('game-reqs');
Route::get('/admin-panel', [PageController::class, 'admin_panel'])->name('admin-panel')->middleware('isAdmin', 'reboot');
Route::get('/approve-profile/{id}', [UserController::class, 'approveProfile'])->name('approveProfile')->middleware('isAdmin');
Route::get('/ban-profile/{id}', [UserController::class, 'banProfile'])->name('banProfile')->middleware('isAdmin');
Route::get('/approve-request/{id}', [RequestController::class, 'approveRequest'])->name('approveRequest')->middleware('isAdmin');
Route::get('/ban-request/{id}', [RequestController::class, 'banRequest'])->name('banRequest')->middleware('isAdmin');
Route::get('/chat', [ChatController::class, 'index'])->name('chat')->middleware('customAuth');
Route::get('/get-messages', [ChatController::class, 'messages'])->name('getMessages')->middleware('customAuth');

Route::post('/send-message', [ChatController::class, 'send'])->name('sendMessages')->middleware('customAuth');
Route::post('/signup', [UserController::class, 'signup'])->name('signup');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/addreq', [RequestController::class, 'add_req'])->name('add-req-post')->middleware('customAuth');
Route::post('/edit-profile/{id}', [UserController::class, 'editProfile'])->name('edit-profile')->middleware('customAuth');
Route::post('/add-chat/{id}', [ChatController::class, 'addChat'])->name('add-chat')->middleware('customAuth');
Route::post('/delete-req/{id}', [RequestController::class, 'deleteRequest'])->name('delete-req')->middleware('customAuth');
