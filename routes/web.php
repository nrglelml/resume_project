<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
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
   Route::post('/education/add',[EducationController::class , 'add']);
   Route::match(['GET', 'POST'],'/education/change-status/{id}',[EducationController::class,'changeStatus'])->name('admin.education-changeStatus');
   Route::match(['GET', 'POST'],'/education/delete/{id}',[EducationController::class,'delete'])->name('admin.education-delete');

   Route::get('/experience/list',[ExperienceController::class ,'list'])->name('admin.experience-list');
   Route::get('/experience/add',[ExperienceController::class , 'addShow'])->name('admin.experience-add');
   Route::post('/experience/add',[ExperienceController::class,'add']);
   Route::match(['GET', 'POST'],'/experience/change-status',[ExperienceController::class,'changeStatus'])->name('admin.experience-changeStatus');
   Route::match(['GET', 'POST'],'/experience/active-status',[ExperienceController::class,'activeStatus'])->name('admin.experience-activeStatus');
   Route::match(['GET', 'POST'],'/experience/delete/{id}',[ExperienceController::class,'delete'])->name('admin.experience-delete');
});
