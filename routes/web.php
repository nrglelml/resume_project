<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\PersonalInfoController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\PortfolioController;
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
Route::middleware('data.share')->group(function(){
    Route::get('/' , [FrontController::class , 'home'])->name('home');
    Route::get('/resume' , [FrontController::class , 'resume'])->name('resume');
    Route::get('/portfoli' , [FrontController::class , 'portfolio'])->name('portfoli');
    Route::get('/blog' , [FrontController::class , 'blog'])->name('blog');
    Route::get('/contact' , [FrontController::class , 'contact'])->name('contact');
});


Route::get('/login', function (){
    return view('admin.login');
})->name('login');


Route::prefix('admin')->group(function (){
   Route::get('/',[AdminController::class , 'index'])->name('admin.index');
   Route::prefix('education')->group(function (){
       Route::get('/list',[EducationController::class , 'list'])->name('admin.education-list');
       Route::get('/add',[EducationController::class , 'addShow'])->name('admin.education-add');
       Route::post('/add',[EducationController::class , 'add']);
       Route::match(['GET', 'POST'],'/change-status/{id}',[EducationController::class,'changeStatus'])->name('admin.education-changeStatus');
       Route::match(['GET', 'POST'],'/delete/{id}',[EducationController::class,'delete'])->name('admin.education-delete');
   });
  Route::prefix('experience')->group(function (){
      Route::get('/list',[ExperienceController::class ,'list'])->name('admin.experience-list');
      Route::get('/add',[ExperienceController::class , 'addShow'])->name('admin.experience-add');
      Route::post('/add',[ExperienceController::class,'add']);
      Route::match(['GET', 'POST'],'/change-status/{id}',[ExperienceController::class,'changeStatus'])->name('admin.experience-changeStatus');
      Route::match(['GET', 'POST'],'/active-status/{id}',[ExperienceController::class,'activeStatus'])->name('admin.experience-activeStatus');
      Route::match(['GET', 'POST'],'/delete/{id}',[ExperienceController::class,'delete'])->name('admin.experience-delete');

  });

   Route::get('/personal/info',[PersonalInfoController::class,'index'])->name('admin.personal_info');
   Route::post('personal/info',[PersonalInfoController::class,'update']);

    Route::prefix('social_media')->group(function (){
        Route::get('/list',[SocialMediaController::class ,'list'])->name('admin.social_media-list');
        Route::get('/add',[SocialMediaController::class , 'addShow'])->name('admin.social_media-add');
        Route::post('/add',[SocialMediaController::class,'add']);
        Route::match(['GET', 'POST'],'/change-status/{id}',[SocialMediaController::class,'changeStatus'])->name('admin.social_media-changeStatus');
        Route::match(['GET', 'POST'],'/delete/{id}',[SocialMediaController::class,'delete'])->name('admin.social_media-delete');

    });

});

Route::resource('portfolio','PortfolioController');
Route::post('/portfolio/change-status/', [PortfolioController::class,'changeStatus'])->name('portfolio.changeStatus');

