@extends('layouts.guest.main')


@section('language_content')
<ul class="navbar-nav ml-auto">
    <li class="nav-item active dropdown dropdown-slide dropdown-hover">

    <a class="nav-link dropdown-toggle nav-text" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        {{$currentLang}}
    </a>

    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @foreach ($langs as $lang)
        @if($lang->language != $currentLang)
             <a class="dropdown-item " href="/{{$lang->id}}">{{$lang->language}}</a>
        @endif
        @endforeach
    </div>
</li>
</ul>

@endsection

@section('content')
    <div class="container my-5">
        
     {!!$text['description']!!}
    </div>
@endsection