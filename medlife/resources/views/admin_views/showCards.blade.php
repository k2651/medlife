@extends('layouts.admin.dashboard')

@section('content')
<div class="row">
    <div class="col-md-1 ml-auto">
        <button class="btn btn-primary btn-rounded" data-target="#card-create-modal" data-toggle="modal"><i
                class="fas fa-plus fs"></i></button>
    </div>
</div>
<div class="row">
    @foreach ($cards as $card)
    <div class="col-md-4 ">
        <div class="card-deck">
            <div class="card mt-4">
                <img class="card-img-top img-size" src="/pages/images/{{$page->img}}"  alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-title text-center">{{$card->title}}</h3>
                    <p class="card-text mt-2 card-text-font text-center">{{$card->description}}</p>
                    <hr>
                    <div class="row mt-3">
                        <div class="col h3">
                            {{$card->language->language}}
                        </div>
                        <button class="btn btn-success ml-auto mr-1 edit-card-btn" data-target="#card-edit-modal-{{$card->id}}" data-toggle="modal">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-danger mr-1 delete-card-btn" data-url="{{route('card.destroy', $card->id)}}">
                            <i class="fas fa-trash-alt"></i>
                        </button>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <form data-url="{{route("card.update", $card->id)}}" enctype="multipart/form-data" method="POST" class='edit-card-form' data-id="{{$card->id}}">
        @csrf
        @method('PATCH')
        <div class="modal fade" id="card-edit-modal-{{$card->id}}" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle" style="color:black;">Crearea paginii pentru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control mt-4" value={{$card->title}} id="title-{{$card->id}}">
                            <textarea class="form-control mt-4" rows="3" id="description-{{$card->id}}">{{$card->description}}</textarea>
                            <select class="custom-select mt-4 edit-card-lang-{{$card->id}}">
                                @foreach ($langs as $lang)
                                <option value="{{$lang->id}}">{{$lang->language}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer container">
                            <button  class="btn btn-outline-primary edit-card-btn"  type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </div>
    </form>

    @endforeach
</div>



<div class="modal fade" id="card-create-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle" style="color:black;">Crearea paginii pentru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control mt-4" placeholder="Titlul" id="title">
                <textarea class="form-control mt-4" placeholder="Descriptia" rows="3" id="description"></textarea>
                <select class="custom-select mt-4 add-card-lang">
                    @foreach ($langs as $lang)
                    <option value="{{$lang->id}}">{{$lang->language}}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer container">
                <button data-id="{{$page->id}}" class="btn btn-outline-primary add-card-btn" data-url="{{route("card.store")}}" type="submit">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection
