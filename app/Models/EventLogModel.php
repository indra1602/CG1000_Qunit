<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EventLogModel extends Model
{
    protected $table ='EVENT_LOG';
    protected $fillable = [
        'TIME_STAMP',
        'EVENT'
    ];
}
