<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Newsletter;

class NewsletterAccueil extends Component
{
    public $emailNewsletter;

    protected $rules = [
        'emailNewsletter' => 'required|email'
    ];

    protected $message = [
        'required' => 'Le champ est vide.',
        'email' => 'Veuillez insérer un email valide.',
    ];

    public function AjouterEmail(){
        $this->validate($this->rules, $this->message);

        if( $this->emailNewsletter ){
            $n = new Newsletter;
            $n->email = $this->emailNewsletter;
            $n->save();

            session()->flash('success','Votre email est ajouté avec succès !');
        }else{
            session()->flash('error','Un erreur s\'est introduit, veuillez réessayer plus tard.');
        }

    }
    public function render()
    {
        return view('livewire.newsletter-accueil');
    }
}
