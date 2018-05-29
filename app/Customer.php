<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{

    protected $guard = "customer";

    protected $table = 'customer';
    protected $primaryKey = 'CustomerId';
    public $timestamps = false;
    protected $fillable = [
        'CustomerFullName', 'Password', 'Image','Status','Address','Email','Birthday','Gender','Phone',
    ];
    protected $hidden = [
        'Password', 'remember_token',
    ];
    public function comment(){
        return $this->hasMany('App\Comment','CustomerId');
    }
    public function order(){
        return $this->hasMany('App\Order','CustomerId');
    }

    public function getAuthPassword(){
        return $this->Password;
    }
}
