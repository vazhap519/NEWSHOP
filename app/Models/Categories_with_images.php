<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories_with_images extends Model
{
    use HasFactory;
    public $filable=[
        'name',
        'slug',
        'image',
    ];
}
