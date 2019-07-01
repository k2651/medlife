@extends('layouts.guest.main')

@section('language_content')
{{-- <li class="nav-item dropdown dropdown-slide dropdown-hover">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Romana
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <form action="//ru" method="GET">
                <a class="dropdown-item" href="#">Русский</a>
            </form>
            <form action="/{{$page->route}}/en" method="GET">
                <a class="dropdown-item" href="#">English</a>
            </form>
        </div>
    </li> --}}
@endsection

@section('content')       
<div class="home">
        <div class="background_image" style="background-image:url(images/index_hero.jpg)"></div>
<div class="home_container">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col">
                    <div class="home_content">
                        <div class="home_title text-center">Page is under construction</div>
                        <!-- <div class="home_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien.</div> -->
                        <!-- <div class="button home_button"><a href="#"><span>read more</span><span>read more</span></a></div> -->
                    </div>
                </div>
                <!-- <div class="col">
                    <div class="home_content">
                        <div class="home_title">Medical Services that you can trust</div>
                        <div class="home_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien.</div>
                        <div class="button home_button"><a href="#"><span>read more</span><span>read more</span></a></div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('carousel')
<div class="departments">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title">Lorem ipsum</div>
            </div>
        </div>
        <div class="row dept_row">
            <div class="col">
                <div class="dept_slider_container_outer">
                    <div class="dept_slider_container">

                        <!-- Slider -->
                        <div class="owl-carousel owl-theme dept_slider">

                            <!-- Slide -->
                            <div class="owl-item dept_item">
                                <div class="dept_image"><img src="images/owl_item_1.jpg" alt=""></div>
                            </div>

                            <!-- Slide -->
                            <div class="owl-item dept_item">
                                <div class="dept_image"><img src="images/owl_item_2.jpg" alt=""></div>
                            </div>

                            <!-- Slide -->
                            <div class="owl-item dept_item">
                                <div class="dept_image"><img src="images/owl_item_3.jpg" alt=""></div>
                            </div>

                            <!-- Slide -->
                            <div class="owl-item dept_item">
                                <div class="dept_image"><img src="images/owl_item_4.jpg" alt=""></div>
                            </div>
                            <!-- Slide -->
                            <div class="owl-item dept_item">
                                <div class="dept_image"><img src="images/owl_item_5.jpg" alt=""></div>
                            </div>
                            <!-- Slide -->
                            <div class="owl-item dept_item">
                                <div class="dept_image"><img src="images/owl_item_6.jpg" alt=""></div>
                            </div>
                        </div>

                    </div>

                    <!-- Dept Slider Nav -->
                    <div class="dept_slider_nav"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('cta')
<div class="cta">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/cta_1.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="cta_container d-flex flex-xl-row flex-column align-items-xl-start align-items-center justify-content-xl-start justify-content-center">
						<div class="cta_content text-xl-left text-center">
							<div class="cta_title">Make an appointment with one of our professional Doctors.</div>
							<div class="cta_subtitle">Morbi arcu neque, scelerisque eget ligula ac, congue tempor felis. Integer tempor, eros a egestas.</div>
						</div>
						<div class="button cta_button ml-xl-auto"><a href="#"><span>call now</span><span>call now</span></a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('cards')
        @include('layouts.guest.cards')
@endsection