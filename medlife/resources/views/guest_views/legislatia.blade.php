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
        <a href={{asset('/legislatia/ord-1.pdf')}}>1 Ordin MS RM nr. 303 din 06.05.2010 privind la asigurarea accesului la informația privind propriile date medicale și lista intervențiilor care necesită acordul informat</a><br>
        <a href={{asset('/legislatia/ord-2.pdf')}}>2 Ordinul MS RM nr. 851 din 29.07.2013 Cu privire la aprobarea standardului national de ingrijiri medicale la domiciliu</a><br>
        <a href={{asset('/legislatia/ord-3.pdf')}}>3 Standard national de ingrijiri medicale la domiciliu Ordin nr. 851 din 29.07.2013</a> <br>
        <a href={{asset('/legislatia/ord-4.pdf')}}>4 Ordin MS RM nr. 855 din 29.07.2013 cu privire la organizarea ingrijirilor medicale la domiciliu</a><br>
        <a href={{asset('/legislatia/ord-5.pdf')}}>5 Ordin MS RM nr. 1022 din 30.12.2015 cu privire la organizarea serviciilor de ingrijiri paliative</a><br>
        <a href={{asset('/legislatia/ord-6.pdf')}}>6 Ordin MS RM CNAM nr. 596404-A din 21.07.16 privind aprobarea normelor metodologice de aplicare a programului unic al asigurarii obligatorii de asistenta medicala</a>
    </div>
@endsection