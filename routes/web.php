<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/test', \App\Livewire\SearchBar::class)->name('test');

Route::get('/', \App\Livewire\Home::class)->name('home');

Route::get('/about', \App\Livewire\About::class)->name('about');

Route::get('/contact', \App\Livewire\Contact::class)->name('contact');


Route::get('/posts', \App\Livewire\Posts\Index::class)->name('posts.index');

Route::get('/users', \App\Livewire\Users\Index::class)->name('users.index');
Route::get('/users/{user}', \App\Livewire\Users\Show::class)->name('users.show');

Route::get('/counter', \App\Livewire\Counter::class)->name('counter');
