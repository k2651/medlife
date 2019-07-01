@extends('layouts.guest.main')
@section('language_content')

<li class="nav-item dropdown dropdown-slide dropdown-hover">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Romana
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <form action="/DespreNoi/ru" method="GET">
            <a class="dropdown-item" href="#">Русский</a>
        </form>
        <form action="/DespreNoi/en" method="GET">
            <a class="dropdown-item" href="#">English</a>
        </form>
    </div>
</li>
@endsection
@section('content')
    <div style="height:500px;"><h1>content</h1></div>
@endsection