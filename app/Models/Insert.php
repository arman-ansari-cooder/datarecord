<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insert extends Model
{
        protected $table = 'insert';

    protected $fillable = [
        'custom_id', 'date', 'fullname', 'address', 'photo',
        'total_price', 'room_no', 'status'
    ];
}
