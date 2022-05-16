<?php

use Illuminate\Support\Facades\Route;
use Intuix\Crm\Controllers\DocumentController;
use Intuix\Crm\Controllers\FileController;
use Illuminate\Support\Facades\Storage;
use ConfrariaWeb\File\Services\FileService;

Route::middleware(['web', 'auth'])
    ->prefix('cw')
    ->name('cw.')
    ->group(function () {

    Route::resource('documents', DocumentController::class);
    Route::resource('files', FileController::class);
    Route::get('download/{id}', function(FileService $fileService, $id){
        $file = $fileService->find($id);
        return Storage::download($file->path);
    })->name('files.download');

});
