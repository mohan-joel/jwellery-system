<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = [
        'shop_name',
        'shop_address',
        'shop_contact',
        'shop_logo'
    ];

    public function user()
    {
       return  $this->belongsTo('App\Models\User','id','user_id');
    }
}
