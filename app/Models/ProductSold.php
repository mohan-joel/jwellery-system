<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSold extends Model
{
    use HasFactory;
    protected $fillable = [
        'jwelleryType_id',
        'product_id',
        'net_wt',
        'gross_wt',
        'stone_wt',
        'price'

    ];

    public function jwelleryType()
    {
        return $this->hasOne('App\Models\JwelleryType','id','jwelleryType_id');
    }

    public function product()
    {
        return $this->hasOne('App\Models\Product','id','product_id');
    }
}
