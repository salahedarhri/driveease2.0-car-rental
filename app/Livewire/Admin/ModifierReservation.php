<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Reservation;

class ModifierReservation extends Component
{
    #[Layout('layouts.admin')]

    public function render()
    {
        return view('livewire.admin.modifier-reservation');
    }
}
