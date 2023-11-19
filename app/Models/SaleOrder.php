<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_num',
        'date',
        'customer_id',
        'customer_name',
        'jwelleryType_id',
        'product_id',
        'ordered_qty',
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

    public function customer()
    {
        return $this->hasOne('App\Models\Customers','email','customer_email');
    }
}
