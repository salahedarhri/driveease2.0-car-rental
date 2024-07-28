<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;
use Artesaos\SEOTools\Facades\SEOTools;

class ContacterAdmin extends Component{

    public $nomContact;
    public $prenomContact;
    public $emailContact;
    public $msgContact;
    public $numTelContact;

    protected $rules = [
        'prenomContact'=>'required',
        'nomContact'=>'required',
        'emailContact'=>'required|email',
        'msgContact'=>'required',
    ];

    protected $message = [
        'required' => 'Ce champ est obligatoire.',
        'email' => 'L\'email doit être un email valide.',
    ];

    public function mount(){
        SEOTools::setTitle('À Propos');
        SEOTools::setDescription('Découvrez DriveEase, votre spécialiste en location de voitures au Maroc.
            Nous nous engageons à offrir un service exceptionnel avec des véhicules de qualité, un support client dédié,
            et une flexibilité maximale pour répondre à tous vos besoins de mobilité à Agadir, Casablanca, et Marrakech.
            Apprenez-en plus sur notre mission et nos valeurs pour louer des voitures pas cher.');
        SEOTools::opengraph()->setUrl( env('APP_URL').'/apropos' );
        SEOTools::setCanonical( env('APP_URL').'/apropos' );
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::opengraph()->addProperty('site_name', 'DriveEase');
        SEOTools::jsonLd()->addImage( asset('images/composants/newsletter-400w.png'));

    }

    public function validerContact(){
        $this->validate( $this->rules, $this->message );

        $message = new Message;
        $message->nom = trim($this->nomContact);
        $message->prenom = trim($this->prenomContact);
        $message->email = trim($this->emailContact);
        $message->message = trim($this->msgContact);

        if( !empty($this->numTelContact)){
            $message->telephone = trim($this->numTelContact);
        }

        $message->save();
        $this->resetChamps();
        
        session()->flash('message', 'Votre message a été envoyé avec succès!');
    }

    public function resetChamps(){
        $this->nomContact = '';
        $this->prenomContact = '';
        $this->emailContact = '';
        $this->msgContact = '';
        $this->numTelContact = '';
    }

    public function render()
    {
        return view('livewire.contacter-admin');
    }
}
