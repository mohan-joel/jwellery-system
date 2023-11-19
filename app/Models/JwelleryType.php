<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JwelleryType extends Model
{
    use HasFactory;
    protected $fillable = [
        'jwellery_type_name',
    ];

    public function product()
    {
        $this->hasMany('App\Models\Product','jwelleryType_id','id');
    }
}
