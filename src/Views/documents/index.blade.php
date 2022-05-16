
@extends('layouts.app')

@section('title', 'Lista de documentos')
@section('breadcrumb_title', 'Documentos')
@section('breadcrumb_subtitle', 'Listagem')

@section('content')

<div class="row justify-content-between ">
    <div class="col-8 float-left">
        <h1>Documentos</h1>
    </div>
    <div class="col-2 float-right">
        <a href="{{ route('cw.documents.create') }}" class="btn btn-success mb-2 float-right">
            <span class="cui-plus btn-icon mr-2"></span>
            Novo documento
        </a>
    </div>
</div>

<div class="table-responsive">
    <table class="table">
        <thead>
            <th>Documento</th>
            <th>Usuário</th>
            <th>Criado</th>
            <th>Atualizado</th>
            <th></th>
        </thead> 
        <tbody>
            @foreach($documents as $document)
                <tr>
                    <td>{{ $document->title }}</td>
                    <td>{{ $document->user->name?? null }}</td>
                    <td>{{ $document->created_at->format('d/m/Y H:i:s') }}</td>
                    <td>{{ $document->updated_at->format('d/m/Y H:i:s') }}</td>
                    <td class="text-right">
                        <div class="btn-group" role="group" aria-label="Basic">
                            <a href="{{ route('cw.documents.edit', $document->id)}}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('cw.documents.destroy', $document->id)}}" class="btn btn-danger" href="{{ route('cw.documents.destroy', ['document' => $document]) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $document->id }}').submit();"><i class="fa fa-trash"></i></a>
                            <form id="delete-form-{{ $document->id }}" action="{{ route('cw.documents.destroy', ['document' => $document]) }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
