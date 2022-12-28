<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopMenu extends Model
{
    use HasFactory;
    protected $filable=[
        'name',
        'slug',
        'link',
        'meta_name',
        'meta_keywoards',
        'meta_description',
        'status',
    ]
}
