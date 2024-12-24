<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MemberController::class, 'index']);


Route::post('/loans/{loan}/return', [LoanController::class, 'return'])->name('loans.return');

Route::resource('members', MemberController::class)->only(['index', 'create', 'store']);
Route::resource('books', BookController::class)->only(['index', 'create', 'store']);
Route::resource('loans', LoanController::class)->only(['index', 'create', 'store']);
