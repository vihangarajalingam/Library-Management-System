<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookStatus extends Model
{
    protected $table = 'bookstatus';
    protected $fillable = [
        'statusid', 'updated_at'
    ];
//    public $timestamps = false;
}
