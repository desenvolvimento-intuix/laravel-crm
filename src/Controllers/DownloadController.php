<?php

namespace Intuix\Crm\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use ConfrariaWeb\File\Services\FileService;

class DownloadController extends Controller
{

    public function download(FileService $fileService, $id){
        $file = $fileService->find($id);
        return Storage::download($file->path);
    }

}
