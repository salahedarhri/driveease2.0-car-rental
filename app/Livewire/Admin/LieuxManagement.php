<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Lieu;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

class LieuxManagement extends Component
{
    use WithFileUploads;
    use WithPagination;
    #[Layout('layouts.admin')] 
    
    public $search = '';
    public $ordreVariable = null;
    public $ordre = 'asc';

    public $nom = '';
    public $ville = '';
    public $type = '';

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

    public function sortBy($v){
        if($this->ordreVariable == $v){
            $this->ordre = $this->ordre === 'asc' ? 'desc':'asc';
        }else{
            $this->ordre = 'asc';
        }

        $this->ordreVariable = $v;
    }

    public function AjouterLieu(){
        $this->validate($this->rules, $this->message);

        try{
            $lieu = New Lieu;
            $lieu->nom = trim($this->nom);
            $lieu->ville = trim($this->ville);
            $lieu->type = trim($this->type);
            $lieu->save();

            session()->flash('success','Lieu ajouté avec succès !');
        }catch(\Exception $e){
            session()->flash('error', $e->getMessage());
            dump($e->getMessage());
        }
    }

    public function SupprimerLieu($id){
        try{
            Lieu::find($id)->delete();
            session()->flash('success','Lieu supprimé avec succès !');

        }catch(\Exception $e){
            session()->flash('error',$e->getMessage());
        }
    }

    public function render()
    {
        $query = Lieu::where('nom','like','%'.$this->search.'%')
                    ->orWhere('ville','like','%'.$this->search.'%')
                    ->orWhere('type','like','%'.$this->search.'%');

        
        if(!empty($this->ordreVariable)){
            $query->orderBy($this->ordreVariable,$this->ordre);
        }

        $lieux = $query->paginate(12);

        return view('livewire.admin.lieux-management',[
            'lieux' => $lieux,
        ]);
    }
}
