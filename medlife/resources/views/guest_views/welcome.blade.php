@extends('layouts.guest.main')
@section('content')

<div class="home">
    <div class="background_image" id = 'welcome-wp'>
    </div>
</div>
<div class="info">
    <div class="container">
        <div class="row row-eq-height">
            @foreach ($pagesWelcome as $page)
           
                <div class="col-lg-4 info_box_col">
                    <div class="info_box">
                        <div class="info_image"><img src="/pages/images/{{$page->img}}"></div>
                        <div class="info_content"> 
                            <a href="{{route('getPage', ['pageId'=>$page->id, 'langID'=>$langID])}}">
                                <div class="info_title">@if($page->getCardByLangId($langID)){{$page->getCardByLangId($langID)->title}}@endif</div>
                                <div class="info_text">@if($page->getCardByLangId($langID)){{$page->getCardByLangId($langID)->description}}@endif</div>
                            </a>
                        </div>
                    </div>
                </div>
            
            @endforeach
        </div>
    </div>
</div>

<div class="departments">
    <div class="container-fluid">
        <div class="row dept_row">
            <div class="col">
                <div class="dept_slider_container_outer">
                    <div class="dept_slider_container">
                        <div class="owl-carousel ml-5 owl-theme dept_slider" data-responsive="{0:{items:1},600:{items:3},1000:{items:5}}">
                            <div class="owl-item dept_item">
                                <div class="dept_image pl-5"><img width="65%"  src="images/owl_item_1.jpg" alt=""></div>
                            </div>
                            <div class="owl-item dept_item">
                                <div class="dept_image pl-5"><img width="65%" src="images/owl_item_2.jpg" alt=""></div>
                            </div>
                            <div class="owl-item dept_item">
                                <div class="dept_image pl-5"><img width="65%" src="images/owl_item_3.jpg" alt=""></div>
                            </div>
                            <div class="owl-item dept_item">
                                <div class="dept_image pl-5"><img width="65%" src="images/owl_item_4.jpg" alt=""></div>
                            </div>
                            <div class="owl-item dept_item">
                                <div class="dept_image pl-5"><img width="65%" src="images/owl_item_5.jpg" alt=""></div>
                            </div>
                            <div class="owl-item dept_item">
                                <div class="dept_image pl-5"><img width="65%" src="images/owl_item_6.jpg" alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<iframe src="https://www.google.com/maps/d/embed?mid=1GAEjkQrfH5f9--LrSpLi79urjkzDmNss" width="100%" height="500"></iframe>
@endsection
