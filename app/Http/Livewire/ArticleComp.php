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

    public function showAddTypeArticleModal(){
        $this->dispatchBrowserEvent("showModal");
    }

    public function editArticle(Article $article){

    }

    public function confirmDelete(Article $article){

    }
}
