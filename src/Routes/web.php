<?php

use Illuminate\Support\Facades\Route;
use Intuix\Crm\Controllers\DocumentController;
use Intuix\Crm\Controllers\DownloadController;
use Intuix\Crm\Controllers\FileController;


Route::middleware(['web', 'auth'])
    ->prefix('cw')
    ->name('cw.')
    ->group(function () {

    Route::resource('documents', DocumentController::class);
    Route::resource('files', FileController::class);
    //Route::get('download/{id}', ['DownloadController', 'download'])->name('files.download');

});
