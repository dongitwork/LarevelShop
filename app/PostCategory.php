<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;


class PostCategory extends Model
{
    protected $table      = 'post_category';
    public    $timestamps = false;
    protected $primaryKey = 'PostCategoryId';
    protected $fillable   = [
        'PostCategoryName','Description',
    ];

}
