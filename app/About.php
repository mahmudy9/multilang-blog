<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use \Dimsav\Translatable\Translatable;
    
    public $translatedAttributes = ['content'];
    protected $fillable = ['content'];
}
