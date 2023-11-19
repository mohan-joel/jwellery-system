<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'supplier_id',
        'jwelleryType_id',
        'product_id',
        'added_qty',
        'tax',
        'discount',
        'grand_total'
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
