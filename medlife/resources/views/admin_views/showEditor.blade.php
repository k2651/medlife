@extends('layouts.admin.dashboard')


@section('content')
<div class="row">
        <div class="col-md-1 ml-auto">
            <button class="btn btn-primary btn-rounded" data-target="#add-text" data-toggle="modal"><i
                    class="fas fa-plus fs"></i></button>
        </div>
</div>

<div class="row">
    @foreach ($texts as $text)
<div class="card col m-5" style="width: 30rem;">
        <div class="card-body">
          <h5 class="card-title">{{$text->page->route_name}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">Limba: {{$text->language->language}}</h6>
          <a href="#" class="card-link" data-target="#edit-text-{{$text->id}}" data-toggle="modal">Editare</a>
        </div>
      </div>
      <div class="container-fluid">
            <div class="modal fade modal-center" id="edit-text-{{$text->id}}" tabindex="-1" role="dialog" aria-labelledby="add-text-label"
                aria-hidden="true" style="position:absolute; left:10%;">
                <div class="modal-dialog modal-dialog-custom modal-dialog-centered modal-lg " role="document">
                    <div class="modal-content md-lg">
                        <div class="modal-header">
                            <h5 class="modal-title" id="add-text-label">Editarea textului</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('text.update', $text->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <h3 class='route mb-3'>{{$page->route_name}}( Limba: {{$text->language->language}} )</h3>
                                <button type="submit" class="btn btn-outline-primary mb-3 ">Save</button>
                                <input type="hidden" name="page_id" value="{{$page->id}}">
                                <textarea class="editor" data-id = "{{$text->id}}" class="editor-textarea" name="description" required>{!!$text->description!!}</textarea>
                                <script>
                                            $(".editor").summernote({
                                                tabsize: 2,
                                                height: 500,
                                                width: 1200
                                            });
                                </script>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endforeach
</div>


<div class="container-fluid">
    <div class="modal fade modal-center" id="add-text" tabindex="-1" role="dialog" aria-labelledby="add-text-label"
        aria-hidden="true" style="position:absolute; left:10%;">
        <div class="modal-dialog modal-dialog-custom modal-dialog-centered modal-lg " role="document">
            <div class="modal-content md-lg">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-text-label">Crearea textului</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('text.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <h3 class='route'>{{$page->route_name}}</h3>
                        <input type="hidden" name="page_id" value="{{$page->id}}">
                        <div class="row mx-3">
                            <button type="submit" class="btn btn-outline-primary my-4 ml-3">Save</button>
                            <div class="col-12">
                                <select class="custom-select add-page-lang mb-5" name="lang_id">
                                    @foreach ($langs as $lang)
                                    <option value="{{$lang->id}}">{{$lang->language}}</option>
                                    @endforeach
                            </div>
                            </select>
                        </div>
                        <textarea id="editor2" name="description" required></textarea>
                        <script>
                            $('#editor2').summernote({
                                tabsize: 2,
                                height: 500,
                                width: 1200
                            });
                            
                        </script>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


@endsection
