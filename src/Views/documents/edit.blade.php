
@extends('layouts.app')

@section('title', 'Lista de documentos')
@section('breadcrumb_title', 'Documentos')
@section('breadcrumb_subtitle', 'Novo')

@section('content')

<div class="row justify-content-between ">
    <div class="col-8 float-left">
        <h1>Novo Documento</h1>
    </div>
    <div class="col-2 float-right">
        <button class="btn btn-success mb-2 float-right" href="javascript:void(0)" onclick="document.getElementById('form-documents').submit()">
            <span class="fa fa-save btn-icon mr-2"></span>
            Salvar
        </button>
        <a class="btn btn-alert mb-2 float-right" href="{{ route('cw.documents.index') }}">
            <span class="fa fa-next btn-icon mr-2"></span>
            Voltar
        </a>
        <a href="{{ route('cw.documents.create') }}" class="btn btn-success mb-2 float-right">
            <span class="cui-plus btn-icon mr-2"></span>
            Novo documento
        </a>
    </div>
</div>

<form action="{{ route('cw.documents.update', $document->id) }}" method="post" enctype="multipart/form-data" id="form-documents">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="_method" value="PUT" />
    @include('crm::documents.form')
</form>

@endsection

@push('css')
    <!-- include libraries(jQuery, bootstrap) -->
    <!--link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"-->
    <!--script src="https://code.jquery.com/jquery-3.5.1.min.js"></script-->
    <!--script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script-->
@endpush
@push('scripts')
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                tabsize: 2,
                height: 500,
                focus: true,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
  </script>
@endpush