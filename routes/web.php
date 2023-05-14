<?php

use App\Http\Controllers\Administrations\AdminController;
use App\Http\Controllers\Administrations\CategoryController;
use App\Http\Controllers\Administrations\EvenementController;
use App\Http\Controllers\Administrations\GenConfigController;
use App\Http\Controllers\Administrations\PostController;
use App\Http\Controllers\Administrations\RoleController;
use App\Http\Controllers\Administrations\TypeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::post('contact',[ContactController::class,'store'])->name('contact.store');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/*ADMIN ROUTES */
Route::prefix('admin')->name('admin.')->middleware(['auth','check_permissions'])->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::get('/roles',[RoleController::class,'index'])->name('role.index');
    Route::get('/types',[TypeController::class,'index'])->name('type.index');
    Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
    //event admin
    Route::post('/evenements.add',[EvenementController::class,'add'])->name('evenements.add');
    Route::get('/evenements.create',[EvenementController::class,'create'])->name('evenements.create');
    Route::get('/evenements.edit/{slug}',[EvenementController::class,'edit'])->name('evenements.edit');
    Route::post('/evenements.update/{event}',[EvenementController::class,'update'])->name('evenements.update');
    Route::get('/evenements',[EvenementController::class,'index'])->name('evenements.index');

    //posts admin
    Route::get('/post.index',[PostController::class,'index'])->name('posts.index');
    Route::get('/post.create',[PostController::class,'create'])->name('posts.create');
    Route::post('/post.add',[PostController::class,'add'])->name('posts.add');
    Route::get('/post.edit/{slug}',[PostController::class,'edit'])->name('posts.edit');
    Route::post('/post.update/{post}',[PostController::class,'update'])->name('posts.update');

    //Configuration generale
    Route::get('setting.index',[GenConfigController::class,'index'])->name('settings.index');
    Route::post('/changeLogo',[GenConfigController::class,'changeLogo'])->name('genConfig.changeLogo');
    Route::post('/changeBg',[GenConfigController::class,'changeBg'])->name('genConfig.changeBg');
    Route::post('/changeIcon32',[GenConfigController::class,'changeIcon48'])->name('genConfig.changeIcon48');
    Route::post('/changeIcon16',[GenConfigController::class,'changeIcon16'])->name('genConfig.changeIcon16');
    Route::post('/changeAppleIcon',[GenConfigController::class,'changeAppleIcon'])->name('genConfig.changeAppleIcon');
    Route::get('/categories.index',[CategoryController::class,'index'])->name('categories.index');
});
