<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;




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

Route::get('/',[HomeController::class,'show_post'])->name('home');


// Route::get('/',[CommentController::class,'index'])->name('home');

// Route::post('/',[CommentController::class,'index'])->name('home');

Route::post('/store-comment', [CommentController::class, 'store']);



Route::middleware(['auth'])->group(function(){

// Route::get()
    
Route::get('/post', [PostController::class,'index'])->name('post_index');

Route::post('/post', [PostController::class,'create'])->name('post_create');

Route::get('/post/edit/{id}', [PostController::class,'edit'])->name('post_edit');

Route::put('/post/edit/{id}', [PostController::class,'update'])->name('post_update');

Route::get('/post/delete/{id}', [PostController::class,'destroy'])->name('post_destroy');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard',[DashboardController::class,'show_post'])->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

});




require __DIR__.'/auth.php';
