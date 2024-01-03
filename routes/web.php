<?php

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

Route::get('/', \App\Livewire\HomePage::class)->name('home_page');
Route::get('/sitemap.xml', function (){
    return response()->view('pages.sitemap')->header('Content-Type', 'application/xml');
});
Route::get('/{name}', \App\Livewire\SinglePost::class)->name('single_post');
Route::get('/start/{param}', \App\Livewire\AlphabetPage::class)->name('alphabet_page');
Route::get('/genders/{param}', \App\Livewire\GenderPage::class)->name('gender_page');
Route::get('/religions/{param}', \App\Livewire\ReligionPage::class)->name('religion_page');
Route::get('/origins/{param}', \App\Livewire\OriginPage::class)->name('origin_page');
Route::get('/pages/{page}', \App\Livewire\Page::class)->name('page');
