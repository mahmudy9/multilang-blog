<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use \Dimsav\Translatable\Translatable;
    
    public $translatedAttributes = ['title' , 'content'];
    protected $fillable = [ 'title' ,'content'];

}
