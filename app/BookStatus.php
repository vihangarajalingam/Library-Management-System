<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookStatus extends Model
{
    /**
     * This is the model used to access the bookstatus table in the database
     * The fillable variable specifies which fields have to be updated
     */
    protected $table = 'bookstatus';
    protected $fillable = [
        'statusid', 'updated_at'
    ];
}
