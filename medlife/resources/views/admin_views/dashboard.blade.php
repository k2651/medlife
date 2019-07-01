@extends('layouts.admin.dashboard')

@section('content')
<div class="row">
        <div class="col-md-1 ml-auto">
            <button class="btn btn-primary btn-rounded" data-target="#pageCreateModal" data-toggle="modal"><i
                    class="fas fa-plus fs"></i></button>
        </div>
</div>

<div class="row">
    @foreach ($pages as $page)
        <div class="col-md-4">
            <div class="card-deck">
                <div class="card mt-4 h-card-dashboard">
                    <img class="card-img-top img-size" src="/pages/images/{{$page->img}}"  alt="Card image cap">
                    <div class="card-body">
                             <h3 class="card-title text-center">{{$page->route_name}}</h3>
                      <a href="{{route('card.show', $page->id)}}" class="btn btn-outline-primary my-1 btn-block font-btn">Carduri</a>
                      <a href="{{route('subpage.show', $page->id)}}" class="btn btn-outline-info my-1 btn-block font-btn">Subpagini</a>
                      <a href="{{route('page.edit', $page->id)}}" class="btn btn-outline-success my-1 btn-block font-btn">Editarea Contentului</a>
                    <div class="row">
                            <button class="btn btn-success col ml-3 edit-page-btn mr-1"  data-target="#page-edit-modal-{{$page->id}}" data-toggle="modal" data-url='{{route("page.update",$page->id)}}'  data-route = "{{$page->route_name}}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger col mr-3 delete-page-btn ml-1" 
                                data-url="{{route('page.destroy', $page->id)}}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                    </div>
                     <div class="row mt-2 nav-active-div">
                         <div class="col-12 text-center">
                            <h2>Ordinea {{$page->index}}</h2>
                         </div>
                             <div class="custom-control custom-switch text-right ml-auto">
                                    <input type="checkbox" class="custom-control-input nav-show-page-checkbox " {{$page->nav_active == 1 ? 'checked' : ''}} id="switch-{{$page->id}}"  data-id="{{$page->id}}" data-url="{{route('page.update.nav', $page->id)}}">
                                    <label class="custom-control-label" for="switch-{{$page->id}}" >Afisare pe bara de meniu</label>
                             </div>
                             <div class="custom-control custom-switch text-right ml-auto">
                                <input type="checkbox" class="custom-control-input welcome-show-page-checkbox " {{$page->welcome_active == 1 ? 'checked' : ''}} id="switch-welcome-{{$page->id}}"  data-id="{{$page->id}}" data-url="{{route('page.update.welcome', $page->id)}}">
                                <label class="custom-control-label" for="switch-welcome-{{$page->id}}" >Afisare pe pagina principala</label>
                            </div>
                     </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="page-edit-modal-{{$page->id}}" tabindex="-1" role="dialog">
            
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle" style="color:black;">Modificarea paginii</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
        
                    <form data-url="{{route('page.update', $page->id)}}" enctype="multipart/form-data" data-id = "{{$page->id}}" method="POST" class='edit-page-form'>
                        @csrf
                        @method("PATCH")
                        <div class="modal-body">
                            <label for=".add-page-index routeEdit" class="mt-2 page-ord-label mt-4">Denumirea rutei</label>
                            <input type="text" class="form-control " id="route-edit-{{$page->id}}" value="{{$page->route_name}}">
                            <input type="file" class="mt-4" name='image'>
                            <br>
                            <label for=".add-page-index" class="mt-2 page-ord-label mt-4">Ordinea paginii</label>
                            <select class="custom-select" id="add-page-index-{{$page->id}}">
                                    @for ($i = 1; $i <= 7; $i++)
                                        @if($i == $page->index)
                                         <option value="{{$page->index}}" selected>{{$page->index}}</option>
                                         @else 
                                         <option value="{{$i}}">{{$i}}</option>
                                        @endif
                                    @endfor
                            </select>
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
<div class="modal fade" id="pageCreateModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle" style="color:black;">Crearea paginii</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form data-url="{{route("page.store")}}" enctype="multipart/form-data" id='add-page-form'>
                @csrf
                <div class="modal-body">
                    <input type="text" class="form-control mt-4" placeholder="Denumirea rutei" id="route">
                    <input type="text" class="form-control mt-4" placeholder="Denumirea paginii" id="title">
                    <textarea class="form-control mt-4" placeholder="Descriptia" rows="3" id="description"></textarea>
                    <input type="file" class="mt-4" name='image'>
                    <br>

                    <div class="custom-control custom-switch mt-4 ml-2">
                            <input type="checkbox" class="custom-control-input main-page-checkbox" id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">Pagina Secundara</label>
                    </div>
                    <select class="custom-select mt-4 d-none add-main-page">
                            @foreach ($pages as $page)
                            <option value="{{$page->id}}" id="page-option">{{$page->route_name}}</option>
                            @endforeach
                    </select>
                    <select class="custom-select mt-4 add-page-lang">
                        @foreach ($langs as $lang)
                        <option value="{{$lang->id}}">{{$lang->language}}</option>
                        @endforeach
                    </select>
                    <br>
                    <label for=".add-page-index" class="mt-2 page-ord-label">Ordinea paginii</label>
                    <select class="custom-select add-page-index">
                        @for ($i = 1; $i <= 7; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
                <div class="modal-footer container">
                    <button class="btn btn-outline-primary add-page-btn" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection