<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Top_Center_menu extends Model
{
    use HasFactory;
    protected $table=['top__center_menus'];
    protected $filable=[
        'name',	
        'slug',	
        'link',
        'meta_name',
        'meta_keywoards',
        'meta_description',
        'status',
    ];
}
