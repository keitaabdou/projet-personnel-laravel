<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleComp extends Component

{
    use WithPagination;
    protected $paginationTheme ="Bootstrap";

    public $search = "";


    public function render()
    {
        Carbon::setLocale("fr");

        $articleQuery= Article::query();

        if($this->search != ""){
            $articleQuery->where("nom", "LIKE", "%". $this->search ."%")
                        ->orWhere("noSerie", "LIKE", "%". $this->search ."%");
        }

        return view('livewire.articles.index', [
            "articles" => $articleQuery->latest()->paginate(5)
        ])
            ->extends("layouts.master")
            ->section("contenu");
    }

    public function editArticle(Article $article){

    }

    public function confirmDelete(Article $article){

    }
}
