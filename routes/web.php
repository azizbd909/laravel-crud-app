<?php

use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\ServiceFrontendController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Services listing page
Route::get('/', [ServiceFrontendController::class, 'index'])->name('frontend_services.index');

// Booking form page (service pre-selected via route model binding)
Route::get('/services/{service}/book', [ServiceFrontendController::class, 'book'])->name('frontend_services.book');

// Handle booking form submission
Route::post('/services/book', [ServiceFrontendController::class, 'submitBooking'])->name('frontend_services.submit-booking');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('admin/services', ServiceController::class);
});