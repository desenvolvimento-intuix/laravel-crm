<div class="row">
    <div class="col-12">
        <label>Titulo</label>
        <input name="title" class="form-control mb-3" value="{{ $document->title?? null }}">
    </div>
</div>
<div class="row">
    <div class="col-8">
        <label>Documento</label>
        <textarea name="content" class="form-control" id="summernote" rows="20">{!! $document->content?? null !!}</textarea>
    </div>
    <div class="col-4">
        <label>Grupos</label>
        <select name="groups[]" id="" class="form-control mb-3" multiple>
            @foreach($groups as $group)
                <option value="{{ $group->id }}" {{ isset($document) && $document->groups->where('id', $group->id)->count() > 0? 'selected' : NULL }}>{{ $group->name }}</option>
            @endforeach
        </select>
        <label>Arquivo</label>
        <input type="file" class="form-control mb-3" id="customFile" name="file">
        <label class="mt-5">Existem {{ isset($document)? $document->contents->count() : 0 }} versões desse documento</label>
        <hr>
        <h4>Hashs que podem ser usadas:</h4>
        <p><b>Todas as hashs dos checklists.</b></p>
        <br>
        <h6>Abaixo as hashs de clientes:</h6>
        <br>
        @foreach($columns_clients as $columns_client)
                {{ $columns_client  }} <br>
        @endforeach
    </div>
</div>