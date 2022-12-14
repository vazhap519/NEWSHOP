<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class featured_brands extends Model
{
    use HasFactory;
    protected $fillable=[
        'brand_image',
        'brand_meta_name',
        'brand_meta_description',
        'brand_meta_keywoards',
        'brands_status',
    ];
}
