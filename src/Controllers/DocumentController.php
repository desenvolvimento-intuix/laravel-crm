<?php

namespace Intuix\Crm\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ConfrariaWeb\Document\Models\Group;
use ConfrariaWeb\Document\Services\DocumentService;
use Illuminate\Support\Facades\Schema;

class DocumentController extends Controller
{

    public $documentService;

    public function __construct(DocumentService $documentService)
    {
        $this->documentService = $documentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = $this->documentService->all();

        return view('crm::documents.index', compact('documents'));
    }

    public function create()
    {
        $groups = Group::all();
        $columns_clients = Schema::getColumnListing('cliente');
        //$document = $this->documentService->find($id);
        return view('crm::documents.create', compact('groups', 'columns_clients'));
    }

    public function store(Request $request){ 
        $this->documentService->create($request->all());
        return redirect()->route('cw.documents.index');
    }

    public function edit($id)
    {
        $groups = Group::all();
        $document = $this->documentService->find($id);
        $columns_clients = Schema::getColumnListing('cliente');
        return view('crm::documents.edit', compact('document', 'groups', 'columns_clients'));
    }

    public function update(Request $request, $id){ 
        $this->documentService->update($id, $request->all());
        return redirect()->route('cw.documents.index');
    }

}
