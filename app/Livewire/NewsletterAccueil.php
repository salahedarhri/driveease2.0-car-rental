<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Newsletter;

use App\Mail\NewsletterMail;
use Illuminate\Support\Facades\Mail;
use Artesaos\SEOTools\Facades\SEOTools;


class NewsletterAccueil extends Component
{
    public $emailNewsletter;

    protected $rules = [
        'emailNewsletter' => 'required|email|unique:App\Models\Newsletter,email'
    ];

    protected $message = [
        'required' => 'Le champ est vide.',
        'email' => 'Veuillez insérer un email valide.',
        'unique' => 'Cet email est déjà inscris dans notre newsletter.'
    ];

    public function mount(){
        SEOTools::setTitle('Accueil');
        SEOTools::setDescription('Louez une voiture en toute simplicité avec DriveEase.
            Découvrez notre gamme de véhicules pour tous vos besoins,
            avec des tarifs compétitifs. Réservez maintenant et profitez de votre voyage sans souci.');
        SEOTools::opengraph()->setUrl( env('APP_URL') );
        SEOTools::setCanonical( env('APP_URL') );
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::opengraph()->addProperty('site_name', 'DriveEase');
        SEOTools::jsonLd()->addImage( asset('images/composants/landing-400w.png'));
    }

    public function AjouterEmail(){
        $this->validate($this->rules, $this->message);

        if( $this->emailNewsletter ){
            $newEmail = new Newsletter;
            $newEmail->email = $this->emailNewsletter;
            $newEmail->save();

            Mail::to($newEmail->email)->send( new NewsletterMail($newEmail->email));
            $this->reset($this->emailNewsletter);

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
