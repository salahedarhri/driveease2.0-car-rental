<?php

namespace App\Livewire;

use Livewire\Component;

class ContacterAdmin extends Component
{

    public $nomContact;
    public $prenomContact;
    public $emailContact;
    public $msgContact;
    public $numTelContact;

    protected $rules = [
        'prenomContact'=>'required',
        'nomContact'=>'required',
        'numTelContact'=>'required',
        'emailContact'=>'required|email',
        'msgContact'=>'required',
    ];

    protected $message = [
        'required' => 'Ce champ est obligatoire.',
        'email' => 'L\'email doit être un email valide.',
    ];

    public function validerContact(){
        $this->validate( $this->rules, $this->message );

        
    }

    public function render()
    {
        return view('livewire.contacter-admin');
    }
}
