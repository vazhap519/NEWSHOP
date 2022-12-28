<?php

namespace App\Http\Livewire\Admin;

use App\Models\TopMenu;
use Livewire\Component;

class AdminTopMenuComponent extends Component
{
    public function render()
    {
        $topmenu=TopMenu::orderBy('DESC')->paginate(10);
        return view('livewire.admin.admin-top-menu-component',['topmenu'=>$topmenu]);
    }
}
