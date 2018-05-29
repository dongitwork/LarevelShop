<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $table = 'transaction_detail';
    protected $primaryKey = 'TransactionDetailId';
    protected $fillable = [
        'ErrorCode','Token','Description','TransactionStatus','ReceiverEmail','OrderCode',
        'TotalAmount','PaymentMethod','BankCode','PaymentType','OrderDescription','TaxAmount',
        'DiscountAmount','FeeShipping','ReturnUrl','CancelUrl','BuyerFullname','BuyerEmail',
        'BuyerMobile','BuyerAddress','AffiliateCode','TransactionId','OrderId',
    ];
    public $timestamps = false;
}
