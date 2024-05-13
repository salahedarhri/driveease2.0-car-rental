<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Car;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CarsManagement extends Component
{
    use WithPagination;
    use WithFileUploads;
    #[Layout('layouts.admin')]

    public $search = '';
    public $ordre = 'asc';
    public $ordreVariable = null;
    public $modele = '';
    public $prix = '';
    public $moteur = '';
    public $transmission = '';
    public $photo;
    public $ville = '';
    public $nbPers = '';
    public $minAge = '';
    public $climatisation = '';
    public $description = '';

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

    public function AjouterVoiture(){
        $this->validate($this->rules, $this->message);

        try{
            $voiture = New Car;
            $voiture->modele = trim($this->modele);
            $voiture->prix = trim($this->prix);
            $voiture->ville = trim($this->ville);
            $voiture->moteur = trim($this->moteur);
            $voiture->transmission = trim($this->transmission);
            $voiture->nbPers = trim($this->nbPers);
            $voiture->minAge = trim($this->minAge);
            $voiture->climatisation = ($this->climatisation == 'Oui')?true:false;
            $voiture->slug = Str::slug("$this->modele");

            $voiturePhoto = $voiture->slug.'-photo.jpg';
            $this->photo->storeAs('voitures', $voiturePhoto,'public');

            $upload = File::move(
                storage_path('app/public/voitures/'.$voiturePhoto),
                public_path('images/voitures/'.$voiturePhoto) );

            $voiture->photo = $voiturePhoto;

            if($upload == true){
                $voiture->save();
            }else{
                session()->flash('error','Erreur de téléchrgement des photos');
            }

            session()->flash('success','Voiture ajouté avec succès !');
            $this->resetChamps();

        }catch(\Exception $e){
            session()->flash('error', $e->getMessage());
            dump($e->getMessage());
        }
    }
    public function sortBy($v){
        if($this->ordreVariable == $v){
            $this->ordre = $this->ordre === 'asc' ? 'desc':'asc';
        }else{
            $this->ordre = 'asc';
        }

        $this->ordreVariable = $v;
    }

    public function SupprimerVoiture($id){
        try{
            Car::find($id)->delete();
            session()->flash('success','Voiture supprimé avec succès !');

        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
            dump($e->getMessage());
        }
    }

    public function resetChamps(){
         $this->modele = '';
         $this->prix = '';
         $this->moteur = '';
         $this->transmission = '';
         $this->photo = '';
         $this->ville = '';
         $this->nbPers = '';
         $this->minAge = '';
         $this->climatisation = '';
         $this->description = '';
    }

    public function render(){
        
        $query = Car::where('modele','like','%'.$this->search.'%');

        if(!empty($this->ordreVariable)){
            $query->orderBy($this->ordreVariable,$this->ordre);
        }

        $voitures = $query->paginate(12);

        return view('livewire.admin.cars-management',[
            'voitures' => $voitures,
        ]);
    }
}
