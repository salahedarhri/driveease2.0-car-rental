<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Car;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;

class ModifierVoiture extends Component
{
    use WithFileUploads;
    #[Layout('layouts.admin')]

    public $modele = '';
    public $prix = '';
    public $moteur = '';
    public $transmission = '';
    public $photo;
    public $photoModify;
    public $ville = '';
    public $nbPers = '';
    public $minAge = '';
    public $climatisation = '';
    public $description = '';
    public $idVoiture;

    protected $rules = [
        'modele' => 'required|string|max:255',
        'prix' => 'required|numeric|min:0',
        'moteur' => 'required|string|in:Electrique,Gasoil,Diesel,Hybride',
        'transmission' => 'required|string|in:Auto,Manuelle',
        'photo' => 'required|image|mimes:jpeg,png|max:2048',
        'ville' => 'required|string|max:255',
        'nbPers' => 'required|integer|min:0',
        'minAge' => 'required|integer|min:0|max:100',
        'climatisation' => 'required|in:Oui,Non',
        'description' => 'nullable|string',
    ];
    protected $message = [
        'required' => 'Ce champ est requis.',
        'string' => 'Ce champ doit être une chaîne de caractères.',
        'max' => [
            'string' => 'Le champ :attribute ne doit pas dépasser :max caractères.',
            'numeric' => 'Le champ :attribute ne doit pas dépasser :max.',
        ],
        'numeric' => 'Le champ :attribute doit être un nombre.',
        'in' => 'La valeur du champ :attribute n\'est pas valide.',
        'image' => 'Le champ :attribute doit être une image.',
        'mimes' => 'Le champ :attribute doit être un fichier de type :values.',
        'integer' => 'Le champ :attribute doit être un entier.',
        'min' => [
            'numeric' => 'Le champ :attribute doit être au moins :min.',
            'integer' => 'Le champ :attribute doit être au moins :min.',
        ],
    ];

    public function mount($id){
        $voiture = Car::findOrFail($id);
        $this->idVoiture = $id;

        $this->modele = $voiture->modele;
        $this->prix = $voiture->prix;
        $this->moteur = $voiture->moteur;
        $this->transmission = $voiture->transmission;
        $this->photoModify = $voiture->photo;
        $this->ville = $voiture->ville;
        $this->nbPers = $voiture->nbPers;
        $this->minAge = $voiture->minAge;
        $this->climatisation = ($voiture->climatisation == true)?'Oui':'Non';
        $this->description = $voiture->description;
    }

    public function ModifierVoiture(){
        $this->validate($this->rules, $this->message);
        try{
            $voiture = Car::findOrFail($this->idVoiture);

            $voiture->modele = trim($this->modele);
            $voiture->prix = trim($this->prix);
            $voiture->moteur = trim($this->moteur);
            $voiture->transmission = trim($this->transmission);
            $voiture->ville = trim($this->ville);
            $voiture->nbPers = trim($this->nbPers);
            $voiture->minAge = trim($this->minAge);
            $voiture->description = trim($this->description);

            $voiture->climatisation = ($this->climatisation == 'Oui')? true:false;
            $voiture->slug = Str::slug("$voiture->modele");
            
            if(File::exists(public_path('images/voitures/'.$this->photoModify)) && $this->photo){
                File::delete(public_path('images/voitures/'.$this->photoModify));

                $voiturePhoto = $voiture->slug.'-photo.jpg';
                $this->photo->storeAs('voitures', $voiturePhoto,'public');

                $upload = File::move(
                    storage_path('app/public/voitures/'.$voiturePhoto),
                    public_path('images/voitures/'.$voiturePhoto) );
    
                $voiture->photo = $voiturePhoto;

                if($upload){
                    $voiture->save();
                    session()->flash('success','Voiture modifié avec succès !');
                }
            }

        }catch(\Exception $e){
            session()->flash('error', $e->getMessage());
            dump($e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.modifier-voiture');
    }
}
