<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
    protected $primaryKey = 'ContactId';
    protected $fillable = [
        'ContactId', 'ContactName', 'Email', 'Title', 'Status', 'CreatedAt', 'Content',
    ];
    public $timestamps = false;
}
