
@extends('layouts.app')

@section('title', 'Lista de arquivos')
@section('breadcrumb_title', 'Arquivos')
@section('breadcrumb_subtitle', $file->name)

@section('content')

<div class="row justify-content-between ">
    <div class="col-8 float-left">
        <h1>Arquivos</h1>
    </div>
    <div class="col-2 float-right">
        <!--a href="{{ route('cw.contratos.create') }}" class="btn btn-success mb-2">
            <span class="cui-plus btn-icon mr-2"></span>
            Novo Contrato
        </a-->
    </div>
</div>

<div class="">

    <embed src="{{ $content }}" type="application/pdf" width="100%" height="100%">

    <object data="{{ $content }}" type="application/pdf" width="100%" height="100%">

    <iframe src="{{ $content }}" width="100%" height="100%">
</div>

@endsection
