<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\ExpenseController;


// authenticate route start here
Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
// authenticate route end here

// todo-list resource route start here
Route::resource('todo-list', TodoListController::class);
// todo-list resource route end here
// create route start here
Route::get('/singl/done/{id}', [TodoListController::class, 'singleDone'])->name('single.done');
Route::get('/all/done', [TodoListController::class, 'allDone'])->name('all.done');
Route::get('/all/delete', [TodoListController::class, 'allDelete'])->name('all.delete');
Route::get('/restore/{id}', [TodoListController::class, 'restore'])->name('restore');
Route::get('/force/delete{id}', [TodoListController::class, 'forceDelete'])->name('force_delete');
// create route end here

// expense resource route start here
Route::resource('expense', ExpenseController::class);
Route::get('/category/wise/expense', [ExpenseController::class, 'wiseExpense'])->name('wise.expense');
Route::get('/category/restore/{id}', [ExpenseController::class, 'restore_category'])->name('restore.category');
Route::get('/category/force/delete{id}', [ExpenseController::class, 'category_forceDelete'])->name('category_force_delete');
// expense resource route end here

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
