<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = 'payment_method';
    protected $primaryKey = 'PaymentMethodId';
    public $timestamps = false;
    protected $fillable = [
        'PaymentMethodName', 'Description',
    ];
    public function order(){
        return $this->hasMany('App\Order', 'PaymentMethodId');
    }
}
