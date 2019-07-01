<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Page extends Model
{ 

    protected $fillable = [
        'route_name',
        'page_id',
        'index',
        'img', 
        'nav_active', 
        'drop_active', 
        'visibility',
        'welcome_active'
    ];
    public function text()
    {
        return $this->hasOne(Text::class);
    }
    public function cards($langId)
    {
        return $this->hasMany(Card::class);
    }
    
    public function getCardByLangId($langID)
    {
        return $this->hasMany(Card::class)->where('language_id', $langID)->where('visibility',1)->first();
    }
    
    public function getPageById($page_id)
    {
        return self::where('id', $page_id)->where('visibility', 1)->first();
    }
    public function getIdOfPage($route_name)
    {
        return self::where('route_name', $route_name)->first();
    }
    public static function GetPage($pageCheck)
    {
        
        $page = Page::with('text')->where('route_name', $pageCheck)->first();
        if($page)
            return $page;
        else 
            return null;
    }
    public static function createPage($route_name, $main_page = null, $index = null)
    {
       return parent::create([
            'route_name' => $route_name,
            'page_id' => $main_page,
            'index' => $index
       ])->id;  
    }

    public static function getTitle($route_name)
    {
        return self::where('route_name', $route_name)->where('visibility', 1)->first();
    }

    public function dropDownItems($id) 
    {
        $dropItems = self::where('page_id', $id)->get();
        if($dropItems->count() == 0)
            return null;
        else 
            return $dropItems;
    }
    public function getPageByLang($langId)
    {
        return $this->hasMany(Card::class)->where('language_id', $langId)->first();
    }

    public static function getNavPages()
    {
        return self::where('visibility', 1)->where('nav_active', 1)->orderBy('index', 'asc')->get();
    }

    public static function VisiblePages()
    {
        return self::where('visibility', 1)->where('page_id', null)->get();
    }

    public function getTitleById($page_id)
    {
        return self::where('visibility', 1)->where('page_id', $page_id)->first()->cards->title;
    }
    public function subPages($id)
    {
        return self::where('page_id', $id)->get();
    }
}
