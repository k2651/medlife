<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    protected $fillable = [
        'page_id',
        'description',
        'language_id'
    ];
    public function page()
    {
       return $this->belongsTo(Page::class,'page_id');
    }
    public function language()
    {
        return  $this->belongsTo(Language::class);
    }
    public static function getUserText($id)
    {
        return self::where('page_id', $id)->get();
    }
    public static function createText($description, $page_id, $language_id)
    {
        return parent::create([
            'page_id' => $page_id,
            'description' => $description,
            'language_id' => $language_id
        ]);
    }
}
