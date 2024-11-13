<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlinkoController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () { return view('hello');});

Route::get('/history', function () { return view('history');});

Route::get('/toplist', function () { return view('toplist');});

Route::get('/home', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/plinko', function () {
    return Inertia::render('Plinko');
})->name('plinko');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//új útvonal
Route::get('/register', function () {
    return redirect()->away('/register');
})->name('register');

Route::get('/login', function () {
    return redirect()->away('/login');
})->name('login');

//játék indítása oldal
Route::get('/stargame', function () {
    return redirect()->away('/plinko');
})->name('startgame');

Route::get('/profil', function () {
    return redirect()->away('/profile');
})->name('profile');

Route::get('/toplista', function () {
    return redirect()->away('/toplist');
})->name('toplist');

Route::get('/tortenet', function () {
    return redirect()->away('/history');
})->name('history');



require __DIR__.'/auth.php';
