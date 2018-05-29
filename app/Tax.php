<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;


class Tax extends Model
{
    protected $table      = 'tax';
    public    $timestamps = false;
    protected $primaryKey = 'TaxId';
    protected $fillable   = [
        'TaxName', 'Percent', 'Description', 
    ];

    public static function GetVat()
    {
    	$TaxVat = '';
    	$Vat =  DB::table('tax')->select('tax.Percent')
                ->where('tax.TaxName','VAT')->first();
        if (isset($Vat->Percent)) {
            $TaxVat = $Vat->Percent;
        }
        return $TaxVat;
    }
}
