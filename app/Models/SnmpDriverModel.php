<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SnmpDriverModel extends Model
{
    public $timestamps = false;
    protected $table ='SNMP_DRIVER';
    protected $fillable = [
        'CONFIG_ITEM',
        'VALUE'
    ];
}
