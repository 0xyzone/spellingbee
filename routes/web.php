<?php

use App\Models\Event;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\RegistrationController;

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
    if(auth()->id()){
        return redirect(route('home'));
    }
    return view('welcome');
})->name('welcome');

Route::get('/demo', function() {
    return view('demo');
});

Route::get('/main', function() {
    return view('main-demo');
});

Route::get('/dashboard', function () {
    $events = Event::orderBy('id', 'desc')->paginate(3);
    return view('dashboard', compact('events'));
})->middleware(['auth', 'verified', 'user'])->name('dashboard');

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/events', EventController::class)->only('index');
});

Route::resource('/events', EventController::class)->only('show');

Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('schools', SchoolController::class);
    Route::resource('sponsors', SponsorController::class);
});
Route::resource('event-registrations', RegistrationController::class);

Route::get('/home', [HomeController::class, 'index'])->name('home');


require __DIR__.'/auth.php';
