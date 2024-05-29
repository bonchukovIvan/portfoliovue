<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/skills', [SkillsController::class, 'index'])->name('skills.index');
    Route::get('/dashboard/skills/{id}', [SkillsController::class, 'show'])->name('skills.show');
    Route::post('/dashboard/skills', [SkillsController::class, 'create'])->name('skills.create');
    Route::post('/dashboard/skills/{id}', [SkillsController::class, 'edit'])->name('skills.edit');
    Route::delete('/dashboard/skills/{id}', [SkillsController::class, 'destroy'])->name('skills.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
