<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\BlogPostController;
use \App\Http\Controllers\CustomAuthController;
use \App\Http\Controllers\LocalizationController;
use \App\Http\Controllers\EtudiantController;

use App\Http\Controllers\FileUpload;

use App\Http\Controllers\FileUploadController;


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

Route::get('/blog', [BlogPostController::class, 'index'])->name('blog')->middleware('auth');
Route::get('/blog/{blogPost}', [BlogPostController::class, 'show'])->name('blog.show')->middleware('auth');
Route::get('/blog/create/post', [BlogPostController::class, 'create'])->name('blog.create')->middleware('auth');
Route::post('/blog/create/post', [BlogPostController::class, 'store'])->name('blog.store')->middleware('auth');
Route::get('blog/{blogPost}/edit', [BlogPostController::class, 'edit'])->name('blog.edit')->middleware('auth');
Route::put('blog/{blogPost}/edit', [BlogPostController::class, 'update'])->middleware('auth');
Route::delete('blog/{blogPost}', [BlogPostController::class, 'destroy'])->middleware('auth');
//Route::get('blog-queries', [BlogPostController::class, 'queries'])->middleware('auth');
Route::get('blog/{blogPost}/PDF', [BlogPostController::class, 'showPdf'])->name('blog.pdf')->middleware('auth');

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('custom.login');
Route::get('registration', [CustomAuthController::class, 'create'])->name('registration');;
Route::post('custom-registration', [CustomAuthController::class, 'store'])->name('custom.registration');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('dashboard', [CustomAuthController::class, 'dashboard']);


Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');

Route::get('blog-queries', [BlogPostController::class, 'queries']);

//MERGE
Route::get('/etudiant', [EtudiantController::class, 'create'])->name('test123');


//https://github.com/Laravel-Lang/lang/blob/main/locales/fr/auth.php
//https://www.countryflags.com/icons-overview/



Route::get('/upload-file', [FileUpload::class, 'createForm']);
Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');


