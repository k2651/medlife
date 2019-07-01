<!DOCTYPE html>
<html>

<head>
    <title>Medlife</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Health medical template project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('/styles/bootstrap4/bootstrap.min.css')}}">
    <link href="{{asset('/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/styles/main_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/styles/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/style.css')}}">
</head>

<body>

    <div class="super_container">
        <!-- Menu -->
    


        <header class="header" id="header">


            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="/">Medlife</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse  align-items-center" id="navbarNavDropdown">
                        <ul class="navbar-nav ">
                            @foreach ($nav_pages as $nav_page)
                            @if($nav_page->page_id == null && $nav_page->dropDownItems($nav_page->id) == null)
                            <li class="nav-item active">
                                <a class="nav-link"
                                    href="#">{{$nav_page->getCardByPageId($langID)['title']}}</span></a>
                            </li>
                            @elseif($nav_page->dropDownItems($nav_page->id)->count())

                            @if($nav_page->getCardByPageId($nav_page->id, $langID)['title'])
                            <li class="nav-item dropdown active dropdown-slide dropdown-hover">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{$nav_page->getCardByPageId($nav_page->id, $langID)['title']}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    @foreach ($nav_page->dropDownItems($nav_page->id) as $drop_page)
                                    <a class="dropdown-item"
                                        href="/">{{$drop_page->getCardByPageId($langID)['title']}}</a>
                                    <a class="dropdown-item"
                                        href="/">{{$drop_page->getCardByPageId($langID)['title'] }}</a>
                                    @endforeach
                                </div>
                            </li>
                            @endif
                            @endif
                            @endforeach
                        </ul>
                          @yield('language_content')
                    </div>
                </div>
            </nav>

    </header>

     @yield('content')
     @yield('cards') 
    {{-- @yield('cta') --}}
    @yield('carousel')

    <!-- Footer -->

    <footer class="footer">
        <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/footer.jpg"
            data-speed="0.8"></div>
        <div class="footer_content">
            <div class="container">
                <div class="row">

                    <!-- Footer About -->
                    <div class="col-lg-3 footer_col mt-2">
                        <div class="footer_about">
                            <div class="logo">
                                <a href="/">Medlife<span>+</span></a>
                            </div>
                            {{-- <div class="footer_about_text">Lorem ipsum dolor sit amet, lorem maximus consectetur
                                adipiscing elit. Donec malesuada lorem maximus mauris.</div> --}}

                        </div>
                    </div>

                    <!-- Footer Contact -->
                    <div class="col-lg-5 footer_col">
                        <div class="footer_contact">
                            <div class="footer_contact_title">Contacteaza-ne</div>
                            <div class="footer_contact_form_container">
                                <form action="#" class="footer_contact_form" id="footer_contact_form">
                                    <div
                                        class="d-flex flex-xl-row flex-column align-items-center justify-content-between">
                                        <input type="text" class="footer_contact_input" placeholder="Name"
                                            required="required">
                                        <input type="email" class="footer_contact_input" placeholder="E-mail"
                                            required="required">
                                    </div>
                                    <textarea class="footer_contact_input footer_contact_textarea" placeholder="Message"
                                        required="required"></textarea>
                                    <button class="footer_contact_button">send message</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Hours -->
                    <div class="col-lg-4 footer_col">
                        <div class="footer_hours">
                            <div class="footer_hours_title">Zile de lucru</div>
                            <ul class="hours_list">
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div>Monday – Thursday</div>
                                    <div class="ml-auto">8.00 – 19.00</div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div>Friday</div>
                                    <div class="ml-auto">8.00 - 18.30</div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div>Saturday</div>
                                    <div class="ml-auto">9.30 – 17.00</div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div>Sunday</div>
                                    <div class="ml-auto">9.30 – 15.00</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    </div>

    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('styles/bootstrap4/popper.js')}}"></script>
    <script src="{{asset('styles/bootstrap4/bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
    <script src="{{asset('plugins/easing/easing.js')}}"></script>
    <script src="{{asset('plugins/parallax-js-master/parallax.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
</body>

</html>