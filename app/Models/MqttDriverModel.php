<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MqttDriverModel extends Model
{
    public $timestamps = false;
    protected $table ='MQTT_DRIVER';
    protected $fillable = [
        'CONFIG_ITEM',
        'VALUE'
    ];
}
