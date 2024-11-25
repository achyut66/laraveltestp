<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\InstagramController;
use App\Http\Controllers\TwitterController;
use App\Http\Controllers\PersonalInfoController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/facebook', [FacebookController::class, 'index'])->name('facebook');
Route::get('/instagram', [InstagramController::class, 'index'])->name('instagram');
Route::get('/twitter', [TwitterController::class, 'index'])->name('twitter');
// personal information functions

Route::post('personaldata.save', [PersonalInfoController::class, 'save'])->name('personaldata.save');
Route::get('personaldata.view', [PersonalInfoController::class, 'getAllData'])->name('personaldata.view');
// instagram
Route::post('instagram.save', [InstagramController::class, 'save'])->name('instagram.save');
// facebook
Route::post('facebook.save', [FacebookController::class, 'save'])->name('facebook.save');
Route::get('facebook/edit/{id}', [FacebookController::class, 'edit'])->name('facebook.edit');
Route::post('facebook/update/{id}', [FacebookController::class, 'update'])->name('facebook.update');
Route::post('facebook.search', [FacebookController::class, 'search'])->name('facebook.search');


require __DIR__ . '/auth.php';
