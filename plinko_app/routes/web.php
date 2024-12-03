<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopListController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;

Route::get('/api/topusers', [TopListController::class, 'getData']);

Route::get('/api/auth/status', function (Request $request) {
    if (auth()->check()) {
        return response()->json([
            'authenticated' => true,
            'user' => auth()->user(),]);}
    return response()->json([
        'authenticated' => false,
    ]);});

Route::get('/about', function () {
    return Inertia::render('History');
})->name('history');


Route::get('/hello', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::get('/toplist', function () {
    return Inertia::render('TopList');
})->name('toplist');

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');}
    return Inertia::render('Hello', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('hello');

Route::get('/plinko', function () {
    return Inertia::render('Plinko');
})->middleware(['auth', 'verified'])->name('plinko');

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
Route::get('/startgame', function () {
    return redirect()->away('/plinko');
})->name('startgame');

Route::get('/profil', function () {
    return redirect()->away('/profile');
})->name('profile');

require __DIR__.'/auth.php';
