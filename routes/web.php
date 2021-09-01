<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\Web\WelcomeController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\PropertiesController;



use App\Models\Todo;
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


Route::get('/', [TodosController::class,'index']);
Route::get('/completed-todo', [TodosController::class,'completed_todo'])->name('completed-todo');
Route::get('/completed-todo/{id}', [TodosController::class,'complete_a_todo'])->name('complete-todo');
Route::get('/welcome', [WelcomeController::class,'welcome'])->name('tochisco');
Route::get('/home', [HomeController::class, 'welcome'])->name('Home');



Route::resource('todo', TodosController::class);
Route::resource('web', IndexsController::class);
Route::resource('property', PropertiesController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\Web\HomeController::class, 'welcome'])->name('home');
Route::get('/property', [App\Http\Controllers\Web\HomeController::class, 'property'])->name('property');
Route::get('/prop_comparison', [App\Http\Controllers\Web\HomeController::class, 'prop_com'])->name('prop_comparison');
Route::get('/prop_details', [App\Http\Controllers\Web\HomeController::class, 'prop_detail'])->name('prop_details');
Route::get('/prop_submit', [App\Http\Controllers\Web\HomeController::class, 'prop_sub'])->name('prop_submit');
Route::get('/agent', [App\Http\Controllers\Web\HomeController::class, 'agent'])->name('agent');
Route::get('/about', [App\Http\Controllers\Web\HomeController::class, 'about'])->name('about');
Route::get('/profile', [App\Http\Controllers\Web\HomeController::class, 'profile'])->name('profile');
Route::get('/contact', [App\Http\Controllers\Web\HomeController::class, 'contact'])->name('contact');








