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
//        Route::get('environment/wizard')->name('install.environmentWizard');
//        Route::post('environment/saveWizard')->name('install.environmentSaveWizard');
//        Route::get('database')->name('install.database');
//        Route::get('final')->name('install.final');
    });
});
