<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\PortfolioItemController;

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/portfolio/{id}', [HomeController::class, 'show_portfolio'])->name('home.portfolio');
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
    Route::get('/dashboard/portfolio', [PortfolioItemController::class, 'index'])->name('portfolio.index');
    // Route::get('/dashboard/skills/{id}', [SkillsController::class, 'show'])->name('skills.show');
    Route::post('/dashboard/portfolio', [PortfolioItemController::class, 'create'])->name('portfolio.create');
    // Route::post('/dashboard/skills/{id}', [SkillsController::class, 'edit'])->name('skills.edit');
    Route::delete('/dashboard/portfolio/{id}', [PortfolioItemController::class, 'destroy'])->name('skills.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
