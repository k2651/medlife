@extends('layouts.admin.dashboard')

@section('content')
<div class="row">
    @foreach ($subpages as $subpage)
        <div class="col-md-4">
            <div class="card-deck">
                <div class="card mt-4 h-card-dashboard">
                    <img class="card-img-top img-size" src="/pages/images/{{$subpage->img}}"  alt="Card image cap">
                    <div class="card-body">
                             <h3 class="card-title text-center mt-2">{{$subpage->route_name}}</h3>
                      <a href="{{route('card.show', $subpage->id)}}" class="btn btn-outline-primary my-1 btn-block font-btn mt-5">Carduri</a>
                      <a href="{{route('page.edit', $subpage->id)}}" class="btn btn-outline-success my-1 btn-block font-btn">Editarea Contentului</a>
                    <div class="row ">
                            <button class="btn btn-success col ml-3 edit-subpage-btn mr-1"  data-target="#subpage-edit-modal-{{$subpage->id}}" data-toggle="modal" data-url='{{route("subpage.update",$subpage->id)}}'  data-route = "{{$subpage->route_name}}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger col mr-3 delete-subpage-btn ml-1" 
                                data-url="{{route('subpage.destroy', $subpage->id)}}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                    </div>
                    <div class="row">
                        <div class="custom-control custom-switch ml-auto mt-3">
                            <input type="checkbox" class="custom-control-input drop-show-page-checkbox "
                                {{$subpage->drop_active == 1 ? 'checked' : ''}} id="switch-{{$subpage->id}}"
                                data-id="{{$subpage->id}}" data-url="{{route('subpage.update.drop', $subpage->id)}}">
                            <label class="custom-control-label" for="switch-{{$subpage->id}}">Afisare ca subpagina</label>
                        </div>
                        <div class="custom-control custom-switch text-right ml-auto mt-3">
                            <input type="checkbox" class="custom-control-input welcome-show-page-checkbox " {{$subpage->welcome_active == 1 ? 'checked' : ''}} id="switch-welcome-{{$subpage->id}}"  data-id="{{$subpage->id}}" data-url="{{route('page.update.welcome', $subpage->id)}}">
                            <label class="custom-control-label" for="switch-welcome-{{$subpage->id}}" >Afisare pe pagina principala</label>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
             <div class="modal fade" id="subpage-edit-modal-{{$subpage->id}}" tabindex="-1" role="dialog">
            
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle" style="color:black;">Modificarea paginii</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form data-url="{{route('subpage.update', $subpage->id)}}" enctype="multipart/form-data" data-id = "{{$subpage->id}}" method="POST" class='edit-page-form'>
                        @csrf
                        @method("PATCH")
                        <div class="modal-body">
                            <label for=".add-page-index routeEdit" class="mt-2 page-ord-label mt-4">Denumirea rutei</label>
                            <input type="text" class="form-control " id="route-edit-{{$subpage->id}}" value="{{$subpage->route_name}}">
                            <input type="file" class="mt-4" name='image'>
                            <br>
                        </div>
                     
                        <div class="modal-footer container">
                                
                            <button class="btn btn-outline-primary add-page-btn" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection