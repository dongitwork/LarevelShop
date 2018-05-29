<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'RoleId';
    protected $fillable = [
        'RoleName','Description',
    ];
    public $timestamps = false;

    public function user(){
        return $this->hasMany('App\User','RoleId');
    }
}
