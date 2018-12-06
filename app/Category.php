<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use \Dimsav\Translatable\Translatable;
    
    public $translatedAttributes = ['name'];
    protected $fillable = ['name'];


    public function photos()
    {
        return $this->hasMany('App\Photo' , 'category_id');
    }
}
