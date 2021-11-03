<?php

namespace App\Http\Livewire;

use App\Models\User;
use Facade\Ignition\DumpRecorder\Dump;
use Livewire\Component;
use Livewire\WithPagination;

class Utilisateurs extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    public $isBtnAddClicked = false;

    public $newUser = [];

    //verication du formulaire

    protected $rules = [
        'newUser.nom' => 'required',
        'newUser.prenom' => 'required',
        'newUser.email' => 'required|email|unique:users,email',
        'newUser.telephone1' => 'required|numeric|unique:users,telephone1',
        'newUser.pieceIdentite' => 'required',
        'newUser.sexe' => 'required',
        'newUser.numeroPieceIdentite' => 'required|unique:users,numeroPieceIdentite',
    ];


    // protected $messages = [
    //     'newUser.nom.required' => "le nom de l'utlisateurs est requis.",
    // ];

    // protected $validationAttributes = [
    //     'newUser.telephone1' => "numero de telephone est requis.",
    // ];

    public function render()
    {

        return view('livewire.utilisateurs.index', [
            "users" => User::latest()->paginate(5)
        ])

        ->extends("layouts.master")
        ->section("contenu");
    }
    public function goToAddUser(){
        $this->isBtnAddClicked = true;
    }
     public function goToListUser(){
         $this->isBtnAddClicked = false;
    }
    public function addUser(){



        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();

        $validationAttributes["newUser"]["password"] = "password";

        //dump($validationAttributes);
        // Ajouter un nouvel utilisateur
        User::create($validationAttributes["newUser"]);

        $this->newUser = [];

        $this->dispatchBrowserEvent("ShowSuccessMessage", ["message"=>"utilisateur crée avec succès!"]);

    }
}
