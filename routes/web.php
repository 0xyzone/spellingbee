<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyRegistrationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SponsorController;
use App\Models\Event;
use App\Models\Sponsor;
use Illuminate\Support\Facades\Http;
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
    // 1. Identify as a browser and bypass SSL locally
    $response = Http::withoutVerifying()
        ->withHeaders([
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
            'Accept' => 'application/json',
        ])
        ->get('https://spellingbee.asia/api/sponsors');
    $response2 = Http::withoutVerifying()
        ->withHeaders([
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
            'Accept' => 'application/json',
        ])
        ->get('https://spellingbee.asia/api/supporters');

    // 2. Safely decode the JSON
    $data = $response->json();
    $data2 = $response2->json();

    // dd($data);

    // 3. Ensure $sponsors is a collection of arrays, not strings
    // If $data is just a single string or empty, we pass an empty collection to avoid the 'string offset' error
    $sponsors = is_array($data) ? collect($data) : collect([]);
    $supporters = is_array($data2) ? collect($data2) : collect([]);

    return view('main', compact('sponsors', 'supporters'));
})->name('welcome');

Route::get('/demo', function () {
    return view('demo');
});

Route::get('/main', function () {
    $sponsors = Sponsor::all();
    return view('main', [
        'sponsors' => Sponsor::all(),
    ]);
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/rules', function () {
    return view('rules');
})->name('rules');

Route::get('/dashboard', function () {
    $events = Event::orderBy('id', 'desc')->paginate(3);
    return view('dashboard', compact('events'));
})->middleware(['auth', 'verified', 'user'])->name('dashboard');

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/events', EventController::class)->only('index');
    Route::get('myRegs', [MyRegistrationController::class, 'index'])->name('myRegistrations');
});

Route::resource('/events', EventController::class)->only('show');

Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('schools', SchoolController::class);
    Route::resource('sponsors', SponsorController::class);
});
Route::resource('event-registrations', RegistrationController::class);

Route::get('/home', [HomeController::class, 'index'])->name('home');


require __DIR__ . '/auth.php';
