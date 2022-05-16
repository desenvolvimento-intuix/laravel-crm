
@extends('layouts.app')

@section('title', 'Lista de arquivos')
@section('breadcrumb_title', 'Arquivos')
@section('breadcrumb_subtitle', 'Listagem')

@section('content')

<div class="row justify-content-between ">
    <div class="col-8 float-left">
        <h1>Arquivos</h1>
    </div>
    <div class="col-2 float-right">
        <a href="{{ route('cw.files.create') }}" class="btn btn-success mb-2 float-right">
            <span class="cui-plus btn-icon mr-2"></span>
            Novo arquivo
        </a>
    </div>
</div>

<div class="table-responsive">
    <table class="table">
        <thead>
            <th>Arquivo</th>
            <th>Criado</th>
            <th>#</th>
        </thead> 
        <tbody>
            @foreach($files as $file)
                <tr>
                    <td>{{ $file->name }}</td>
                    <td>{{ $file->created_at->format('d/m/Y') }}</td>
                    <td class="text-right">
                        <div class="btn-group" role="group" aria-label="Basic">
                            <a href="{{ route('cw.files.download', ['id' => $file->id])}}" class="btn btn-info"><i class="fa fa-arrow-down"></i></a>
                            <a href="{{ route('cw.files.edit', $file->id)}}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('cw.files.destroy', $file->id)}}" class="btn btn-danger" href="{{ route('cw.files.destroy', ['file' => $file]) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $file->id }}').submit();"><i class="fa fa-trash"></i></a>
                            <form id="delete-form-{{ $file->id }}" action="{{ route('cw.files.destroy', ['file' => $file]) }}" method="POST" style="display: none;">
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
