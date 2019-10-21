<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagesTranslation extends Model
{
    protected $table = "pages_translations";
    protected $fillable = [
    	'title',
    	'content',
    	'page_id',
    	'lang_id',
    ];
}
