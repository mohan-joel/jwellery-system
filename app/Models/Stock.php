<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'supplier_email',
        'jwelleryType_id',
        'product_id',
        'product_code',
        'barcode',
        'serial_num',
        'net_wt',
        'gross_wt',
        'stone_wt',
    ];

    public function jwelleryType()
    {
        return $this->hasOne('App\Models\JwelleryType','id','jwelleryType_id');
    }

    public function product()
    {
        return $this->hasOne('App\Models\Product','id','product_id');
    }

    public function supplier()
    {
        return $this->hasOne('App\Models\Supplier','email','supplier_email');
    }
}
