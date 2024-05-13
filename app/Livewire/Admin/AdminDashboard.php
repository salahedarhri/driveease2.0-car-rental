<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Carbon;
use App\Models\Reservation;
use App\Models\Car;
use App\Models\Message;
use App\Models\Transaction;

class AdminDashboard extends Component
{   
    #[Layout('layouts.admin')] 


    public function render()
    {
        $yesterday = Carbon::yesterday();
        $today = Carbon::today();

        $reservations = Reservation::whereDate('created_at',$today)->count();
        $voitures = Car::count();
        $transactions = Transaction::whereDate('created_at',$yesterday)->count();
        $messages = Message::whereDate('created_at',$today)->count();

        return view('livewire.admin.admin-dashboard',[
            'reservations' => $reservations,
            'voitures' => $voitures,
            'messages' => $messages,
            'transactions' => $transactions,
        ]);
    }
}
