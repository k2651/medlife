<div class="info">
    <div class="container">
        <div class="row row-eq-height">
            @foreach ($pagesWelcome as $page)
            @if($page->getPageByLang($langID))
                <div class="col-lg-4 info_box_col">
                    <div class="info_box">
                        <div class="info_image"><img src="/pages/images/{{$page->getPageByLang($langID)->page->img}}"></div>
                        <a href="{{route('getPage', ['pageId'=>$nav_page->id, 'langID'=>$langID])}}">
                            <div class="info_content">
                                <div class="info_title">{{$page->getPageByLang($langID)->title}}</div>
                                <div class="info_text">{{$page->getPageByLang($langID)->description}}</div>
                            </div>
                        </a>
                    </div>
                </div>
            @endif
            @endforeach
        </div>
    </div>
</div>