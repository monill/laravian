<?php

use App\Http\Controllers\InstallController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::namespace('Installer')->group(function () {
    Route::prefix('install')->group(callback: function () {
        Route::get('/', [InstallController::class, 'index'])->name('install');
        Route::get('requirements', [InstallController::class, 'requirements'])->name('install.requirements');
        Route::get('permissions', [InstallController::class, 'permissions'])->name('install.permissions');
        Route::get('environment', [InstallController::class, 'environment'])->name('install.environment');
        Route::post('environment', [InstallController::class, 'environmentSave'])->name('install.environmentSave');
        Route::get('database', [InstallController::class, 'database'])->name('install.database');
        Route::post('database', [InstallController::class, 'databaseSave'])->name('install.databaseSave');
        Route::get('migration', [InstallController::class, 'migration'])->name('install.migration');
        Route::get('config', [InstallController::class, 'config'])->name('install.config');
        Route::post('config', [InstallController::class, 'configSave'])->name('install.configSave');
        Route::get('world', [InstallController::class, 'world'])->name('install.world');
        Route::post('world', [InstallController::class, 'worldSave'])->name('install.worldSave');
        Route::get('multihunter', [InstallController::class, 'multihunter'])->name('install.multihunter');
        Route::post('multihunter', [InstallController::class, 'multihunterSave'])->name('install.multihunterSave');
        Route::get('oasis', [InstallController::class, 'oasis'])->name('install.multihunter');
        Route::post('oasis', [InstallController::class, 'oasisSave'])->name('install.oasisSave');
        Route::get('completed', [InstallController::class, 'completed'])->name('install.completed');
    });
});
