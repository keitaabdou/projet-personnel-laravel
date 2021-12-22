<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\TypeArticle;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleComp extends Component

{
    use WithPagination;
    protected $paginationTheme ="Bootstrap";

    public $search = "";
    public $filtreType = "", $filtreEtat = "";
    public $addArticle = [];
    public $proprietesArticles = null;


    public function render()
    {
        Carbon::setLocale("fr");

        $articleQuery= Article::query();

        if($this->search != ""){
            $articleQuery->where("nom", "LIKE", "%". $this->search ."%")
                        ->orWhere("noSerie", "LIKE", "%". $this->search ."%");
        }


        if($this->filtreType != ""){
            $articleQuery->where("type_article_id", $this->filtreType);

        }

        if($this->filtreEtat != ""){
            $articleQuery->where("estDisponible", $this->filtreEtat);

        }

        return view('livewire.articles.index', [
            "articles" => $articleQuery->latest()->paginate(5),
            "typearticles"=> TypeArticle::orderBy("nom", "ASC")->get()

        ])
            ->extends("layouts.master")
            ->section("contenu");
    }

    public function updated($property){
        if($property == "addArticle.type"){
            $this->proprietesArticles = TypeArticle::find($this->addArticle["type"])->proprietes;
        }
    }

    public function showAddTypeArticleModal(){
        $this->dispatchBrowserEvent("showModal");
    }

    public function editArticle(Article $article){

    }

    public function confirmDelete(Article $article){

    }
    public function closeModal(){
        $this->dispatchBrowserEvent("closeModal");

    }

    public function ajoutArticle(){
        //dump($this->addArticle);
        $validateArr = [
            "addArticle.nom" => "string|min:3|required",
            "addArticle.noSerie" => "string|max:50|min:3|required",
            "addArticle.type" => "required"
        ];

        $customErrMessage = [];

        foreach ($this->proprietesArticles as $propriete){
            $field = "addArticle.prop.".$propriete->nom;
            if($propriete->estObligatoire == 1){
                $validateArr[$field] ="required";
                $customErrMessage["$field.required"] = "Le champ " .$propriete->nom. " est obligatoire.";
            }else{
                $validateArr[$field] ="nullable";
            }
        }

        $this->validate($validateArr, $customErrMessage);
    }
}
