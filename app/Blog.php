<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;
    protected $fillable = ['blog_photo','blog_title','blog_description'];
    function relationtocategory(){
      return $this->hasOne('App\Category','id','category_id');

    }
}
