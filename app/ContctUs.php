<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContctUs extends Model
{
    protected $table = "contctus";
    protected $fillable=[
                      'name',
                      'subject',
                      'email',
                      'read',
                      'reply',
                      'message',
                      ];
}
