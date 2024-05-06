<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::group(['middleware' => 'verify.token'], function () {
Route::get('/', [FrontEndController::class, 'signup'])->name('signup');

Route::get('signup',[FrontEndController::class, 'signup'])->name('signup');

Route::get('login',[FrontEndController::class,'login'])->name('login');

Route::post('save-user',[FrontEndController::class,'save_user'])->name('first');

Route::post('login-user',[FrontEndController::class,'login_user'])->name('login_user');

Route::get('todo-creation',[FrontEndController::class,'todo_creation'])->name('todo-creation');

Route::post('add-task',[FrontEndController::class,'add_task'])->name('add-task');

Route::get('todo-view',[FrontEndController::class,'todo_view'])->name('todo-view');

Route::get('welcome-user',[FrontEndController::class,'welcome_user'])->name('welcome-user');

Route::post('update-status/{id}',[FrontEndController::class,'update_status'])->name('update-status');

Route::get('completed_todo',[FrontEndController::class,'completed_todo'])->name('completed-todo');

Route::post('delete-status/{id}',[FrontEndController::class,'delete_status'])->name('delete-status');

Route::get('edit-todo/{id}',[FrontEndController::class,'edit_todo'])->name('edit-todo');

Route::put('update-task/{id}',[FrontEndController::class,'update_task'])->name('update-task');

Route::get('send-mail',[FrontEndController::class,'sendWelcomeMail'])->name('send-mail');

// });
