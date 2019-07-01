<?php

namespace App\Http\Middleware;

use App\User;
use App\Page;
use App\Language;
use Closure;

class Resources
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        $langs = Language::VisibleLangs();
        $pages = Page::VisiblePages();
        $nav_pages = Page::getNavPages();
        if(!$langs)
        {
            $lang = Language::create([
                'language' => 'Romana', 
            ]);
        }

        // dump($nav_pages);
        view()->share('langs', $langs);
        view()->share('pages', $pages);
        view()->share('nav_pages', $nav_pages);

        return $next($request);
    }
}
