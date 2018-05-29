<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table        = 'province';
    protected $primaryKey   = 'ProvinceId';
    public $timestamps      = false;
    public function district(){
        return $this->hasMany('App\District','ProvinceId');
    }
}

class District extends Model
{
    protected $table        = 'district';
    protected $primaryKey   = 'DistrictId';
    public $timestamps      = false;
    public function ward(){
        return $this->hasMany('App\Ward','DistrictId');
    }
    public function province(){
        return $this->belongsTo('App\Province','ProvinceId');
    }
}

class Ward extends Model
{
    protected $table        = 'ward';
    protected $primaryKey   = 'WardId';
    public $timestamps      = false;
    public function district(){
        return $this->belongsTo('App\District','DistrictId');
    }
}

