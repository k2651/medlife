<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
 
    protected $foreign_key = 'id';
    protected $fillable = [
        'title',
        'description',
        'language_id',
        'page_id',
        'image',

    ];    
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    // public function getCardsLang($langId)
    // {
    //     return $this->belongsTo(Page::class)->where('')
    // }
    static function getAllByPageId($page_id){
        return parent::where('page_id', $page_id)->where('visibility',1)->get();
    }
    public function cardByPage($page_id)
    {
        return self::where('page_id', $page_id)->where('visibility',1)->first();
    }
    public static function createCard($title, $description, $language_id, $page_id)
    {
        return self::create([
            'title' => $title,
            'description' => $description,
            'language_id' => $language_id,
            'page_id' => $page_id
        ]);
    }

    static function destroy($id){
        parent::where('id',$id)->update([
            'visibility'=>0
        ]);
        return 1;
    }
}
