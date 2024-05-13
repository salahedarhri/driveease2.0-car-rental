<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Lieu;
use Livewire\Attributes\Layout;


class ModifierLieu extends Component
{
    #[Layout('layouts.admin')] 
    public $nom = '';
    public $ville = '';
    public $type = '';

    public $idLieu;

    protected $rules = [
        'nom' => 'required|string|max:255',
        'ville' => 'required|string|max:255',
        'type' => 'required|string|max:255',
    ];

    protected $message = [
        'required' => 'Ce champ est obligatoire.',
        'string' => 'Ce champ doit être une chaîne de caractères.',
        'max' => 'Le champ :attribute ne doit pas dépasser :max caractères.',
    ];

    public function mount($id){
        $lieu = Lieu::findOrFail($id);
        $this->idLieu = $id;
        $this->nom = $lieu->nom;
        $this->ville = $lieu->ville;
        $this->type = $lieu->type;
    }

    public function ModifierLieu(){
        $this->validate($this->rules, $this->message);

        try{
            $lieu = Lieu::findOrFail($this->idLieu);
            $lieu->nom = trim($this->nom);
            $lieu->ville = trim($this->ville);
            $lieu->type = trim($this->type);
            $lieu->save();

            session()->flash('success','Lieu modifié avec succès !');
            $this->resetChamps();

        }catch(\Exception $e){
            session()->flash('error', $e->getMessage());
            dump($e->getMessage());
        }
    }

    public function resetChamps(){
        $this->nom = '';
        $this->type = '';
        $this->ville = '';
    }

    public function render()
    {
        return view('livewire.admin.modifier-lieu');
    }
}
