<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Top_Center_menu;
use Livewire\WithPagination;
class AdminTopCenterMenuComponent extends Component
{
    public function render()
    {
        $top_center_menu=Top_Center_menu::orderBy('created_at','ASC');
        return view('livewire.admin.admin-top-center-menu-component',['top_center_menu'=>$top_center_menu]);
    }
}
