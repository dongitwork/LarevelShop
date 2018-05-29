<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'user';
    protected $primaryKey = 'UserId';
    public $timestamps = false;
    protected $fillable = [
        'UserName', 'Password', 'Status','Email','Address','Birthday','Gender','Phone','RoleId',
    ];

    protected $hidden = [
        'Password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role','RoleId');
    }

    public function getAuthPassword(){
        return $this->Password;
    }
}
