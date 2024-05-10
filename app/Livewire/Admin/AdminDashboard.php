<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;

class AdminDashboard extends Component
{

    #[Layout('layouts.admin')] 
    public function render()
    {
        return view('livewire.admin.admin-dashboard');
    }
}
