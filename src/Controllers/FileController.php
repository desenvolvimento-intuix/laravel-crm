<?php

namespace Intuix\Crm\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ConfrariaWeb\File\Services\FileService;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class FileController extends Controller
{

    public $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index()
    {
        $files = $this->fileService->all();

        return view('crm::files.index', compact('files'));
    }

    public function create()
    {
        return view('crm::files.create');
    }

    public function show($id)
    {
        $file = $this->fileService->find($id);

        $content = $fileStorage = Storage::response($file->path);
        //return $content;
        $fileStorage = Storage::url($file->path);

        //$pdf = PDF::stream($fileStorage, array("Attachment" => false));

        return view('crm::files.show', compact('file', 'fileStorage', 'content'));
    }

    public function store(Request $request){
        $this->fileService->store($request->all());
        return redirect()->route('cw.files.index');
    }

}
