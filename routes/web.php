<?php

use App\Http\Controllers\BenefitController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CoursesPageController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\VideoController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/video', function () {
    return view('video');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/contact', [ContactController::class, 'contact']);
Route::post('/sendcontact', [ContactController::class, 'send_contact']);
Route::resource('/course', CourseController::class);
Route::delete('/deleteimage/{id}', [CourseController::class, 'deleteimage']);
Route::resource('/stage', StageController::class);
Route::resource('/videopage',VideoController::class);
Route::resource('/test', TestController::class);
Route::resource('/benefit', BenefitController::class);

Route::get('/homepage', [HomePageController::class, 'index']);
Route::get('/homepage', [HomePageController::class, 'benefit']);
Route::get('/homepage', [HomePageController::class, 'testimonials']);
Route::get('/coursepage', [CoursesPageController::class, 'index']);
Route::get('/courses', [CoursesPageController::class, 'showCourse']);

// Route::get('test/video', [VideoController::class, 'index']);
// Route::delete('/deleteimage/{id}',[CourseController::class,'deleteimage']);
// Route::delete('/deleteimage/{id}',[CourseController::class,'deleteimage']);
// Route::post('/test',[TestimonialsController::class,'store']);
// Route::get('/test/create',[TestimonialsController::class,'create']);

require __DIR__ . '/auth.php';
