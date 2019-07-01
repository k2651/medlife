<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Page;
use App\Text;
use App\Language;
class PagesController extends Controller
{
    public function Home()
    {
        return view('guest_views.Acasa');
    }

    public function GetContent($pageCheck, $lang='ro')
    {
        $page = Page::GetPage($pageCheck);
        config( ['language.lang' => $lang] );
        if($page)
        {
            switch($lang)
            {
                case 'ru': 
                    $content = $page->text->description_ru;
                    break;
                case 'en': 
                    $content = $page->text->description_en;
                    break;            
                default:
                    $content = $page->text->description_ro;
                    break;
            }
        }
        else
            abort(404);
        // dd($page->route_name);
        return view('guest_views.'.$page->route_name, compact('content'));
    }

    public function WelcomePage($langID = 0)
    {
        if($langID == 0){
            $langID=Language::where("visibility", 1)->first()->id;
        }

        $pagesWelcome = Page::where('welcome_active', 1)->where('visibility', 1)->get();
        $currentLang = Language::where('visibility', 1)->where('id', $langID)->first()->language;
        $currentPage = null;
             
        return view('guest_views.welcome', compact('langID','pagesWelcome', 'currentLang', 'currentPage'));

    }

    public function getPage($pageID, $langID = 0)
    {
        if($langID == 0){
            $langID = Language::where("visibility", 1)->first()->id;
        } 
        $text = Text::where('page_id', $pageID)->where('language_id', $langID)->first();
        $currentLang = Language::where('visibility', 1)->where('id', $langID)->first()->language;

        $currentPage = Page::where('id', $pageID)->first();
        if($currentPage->route_name == 'Legislatia')
            return view('guest_views.legislatia', compact('langID', 'currentLang', 'currentPage'));
            
        return view('guest_views.page', compact('text', 'langID', 'currentLang', 'currentPage'));
    }

}
