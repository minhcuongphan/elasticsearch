<?php

use App\Articles\SearchRepository;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function (SearchRepository $searchRepository) {
    return view('dashboard', [
        'articles' => request()->has('q')
            ? $searchRepository->search(request('q'))
            : App\Models\Article::all(),
    ]);
})->middleware(['auth'])->name('dashboard'); 

require __DIR__.'/auth.php';
