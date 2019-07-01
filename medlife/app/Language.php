<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    // const table = 'languages';
    // protected $table = self::table;
    // protected $primaryKey = 'id';
    
    protected $fillable = [
        'language'
    ];

    public function card()
    {
        return $this->hasMany(Card::class);
    }
    
    static function store($lang)
    {
        return self::create([
            'language'=>$lang,
        ])->id;
    }
    static function VisibleLangs()
    {
        // if(!$langs)
        // {
        //     $lang = Language::create([
        //         'language' => 'Romana', 
        //     ]);
        // }
        return self::where('visibility', 1)->get();
    }

    static function getByName($name)
    {
        return self::where('language', $name)->where('visibility', 1)->first();
    }
}

