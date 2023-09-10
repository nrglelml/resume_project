<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EducationController;
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
Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

Route::get('/' , [FrontController::class , 'home'])->name('home');


Route::get('/resume' , [FrontController::class , 'resume'])->name('resume');

Route::get('/portfolio' , [FrontController::class , 'portfolio'])->name('portfolio');

Route::get('/blog' , [FrontController::class , 'blog'])->name('blog');

Route::get('/contact' , [FrontController::class , 'contact'])->name('contact');

Route::get('/login', function (){
    return view('admin.login');
})->name('login');
Route::get('/register', function (){
    return view('admin.register');
})->name('register');

Route::prefix('admin')->group(function (){
   Route::get('/',[AdminController::class , 'index'])->name('admin.index');
   Route::get('/education/list',[EducationController::class , 'list'])->name('admin.education-list');
   Route::get('/education/add',[EducationController::class , 'addShow'])->name('admin.education-add');
   Route::post('/education/add',[EducationController::class , 'add'])->name('add');
   Route::match(['GET', 'POST'],'/education/change-status/{id}',[EducationController::class,'changeStatus'])->name('admin.education-changeStatus');
   Route::post('/education/delete',[EducationController::class,'delete'])->name('admin.education-delete');

});
