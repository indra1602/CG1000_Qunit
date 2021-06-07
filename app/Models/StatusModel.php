<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusModel extends Model
{
    public $timestamps = false;
    protected $table ='STATUS';
    protected $fillable = [
        'ID_STATUS',
        'ITEM',
        'VALUE'
    ];
}
