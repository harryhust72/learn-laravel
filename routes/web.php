<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

Route::get('/books', [BooksController::class, 'list'])->name('books.list');
Route::post('/books', [BooksController::class, 'store'])->name('books.store');
Route::get('/books/create', [BooksController::class, 'create'])->name('books.create');
Route::get('/books/{id}', [BooksController::class, 'detail'])->where('id', '[0-9]+')->name('books.detail');
Route::patch('/books/{id}', [BooksController::class, 'update'])->where('id', '[0-9]+')->name('books.update');
Route::delete('/books/{id}', [BooksController::class, 'destroy'])->where('id', '[0-9]+')->name('books.destroy');