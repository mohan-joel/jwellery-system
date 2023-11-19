<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'jwelleryType_id',
        'product_cp',
        'product_sp',
        'description'
    ];

    public function jwelleryType()
    {
        return $this->belongsTo(JwelleryType::class,'jwelleryType_id','id');
    }
}
