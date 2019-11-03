<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlockAds extends Model
{
    protected $table = "block_ads";
    protected $fillable = [
    	'ad_id',
    	'user_id',
    	'message',
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
