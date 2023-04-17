<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\PasswordController;
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
Route::get('/chat', [ChatController::class, 'index'])->name('chat')->middleware('customAuth');
Route::get('/get-messages', [ChatController::class, 'messages'])->name('getMessages')->middleware('customAuth');
Route::get('/online', [PageController::class, 'online'])->name('online')->middleware('customAuth');
Route::get('/forget-password', [PasswordController::class, 'forgetPasswordPage'])->name('forget-password-page');
Route::get('/reset-password/{token}', [PasswordController::class, 'resetPasswordPage'])->name('reset-password-page');
Route::get('/notification-handle', [AjaxController::class, 'handleNotification'])->name('not-handle')->middleware('customAuth');

Route::post('/send-message', [ChatController::class, 'send'])->name('sendMessages')->middleware('customAuth');
Route::post('/signup', [UserController::class, 'signup'])->name('signup');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/addreq', [RequestController::class, 'addReq'])->name('add-req-post')->middleware('customAuth');
Route::post('/edit-profile/{id}', [UserController::class, 'editProfile'])->name('edit-profile')->middleware('customAuth');
Route::post('/add-chat/{id}', [ChatController::class, 'addChat'])->name('add-chat')->middleware('customAuth');
Route::post('/delete-req/{id}', [RequestController::class, 'deleteRequest'])->name('delete-req')->middleware('customAuth');
Route::post('/online-search', [RequestController::class, 'onlineSearch'])->name('online-search')->middleware('customAuth');
Route::post('/forget-password', [PasswordController::class, 'forgetPassword'])->name('forget-password');
Route::post('/reset-password', [PasswordController::class, 'resetPassword'])->name('reset-password');
Route::post('/leave-queue', [RequestController::class, 'leaveQueue'])->name('leave-queue')->middleware('customAuth');
Route::post('/profile-decision/{id}', [UserController::class, 'profileDecision'])->name('profile-decision')->middleware('isAdmin');
Route::post('/request-decision/{id}', [RequestController::class, 'requestDecision'])->name('request-decision')->middleware('isAdmin');
Route::post('/online-decision/{id}', [RequestController::class, 'onlineDecision'])->name('online-decision')->middleware('customAuth');
Route::post('/test/{id}', [RequestController::class, 'test'])->name('test')->middleware('customAuth');
Route::post('/decline-search/{id}', [RequestController::class, 'declineRequest'])->name('decline-request')->middleware('customAuth');
