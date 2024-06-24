<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use App\Models\Reservation;


class ReservationsManagement extends Component
{
    use WithPagination;
    #[Layout('layouts.admin')]

    public function render()
    {
        $query = Reservation::where('modele','like','%'.$this->search.'%');

        if(!empty($this->ordreVariable)){
            $query->orderBy($this->ordreVariable,$this->ordre);
        }

        $reservations = $query->paginate(12);

        return view('livewire.admin.reservations-management');
    }
}
