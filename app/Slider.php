<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;


class Slider extends Model
{
    protected $table      = 'slider';
    public    $timestamps = false;
    protected $primaryKey = 'SliderId';
    protected $fillable   = [
        'ProductPublishId', 'Title','SliderImage',
    ];

}
