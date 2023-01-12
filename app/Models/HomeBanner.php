<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeBanner extends Model
{
    use HasFactory;
    protected $fillable=[
        'image',
        'title',
        'description',
        'meta_name',
        'meta_description',
        'meta_keywoards',

    ];
}
