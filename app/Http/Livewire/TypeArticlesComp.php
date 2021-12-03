<?php

namespace App\Http\Livewire;

use App\Models\TypeArticle;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class TypeArticlesComp extends Component
{
    use WithPagination;
    public $search = "";
    public $isAddTypeArticle = false;
    public $newTypeArticleName = "";

    protected $paginationTheme ="Bootstrap";

    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%".$this->search."%";
        $data = [
            "typearticles" => TypeArticle::where("nom", "like",$searchCriteria)->latest()->paginate(5)
        ];
        return view('livewire.typearticles.index', $data)
                ->extends("layouts.master")
                ->section("contenu");
    }

    public function toggleShowAddTypeArticleForm(){
        if($this->isAddTypeArticle){
            $this->isAddTypeArticle = false;
            $this->newTypeArticleName = "";
            $this->resetErrorBag(["newTypeArticleName"]);
        }else{
            $this->isAddTypeArticle = true;
        }

    }

    public function addNewTypeArticle(){

        $validated = $this->validate([
            "newTypeArticleName" => "required|max:50|unique:type_articles,nom"
        ]);

        TypeArticle::create(["nom" => $validated["newTypeArticleName"]]);

        $this->toggleShowAddTypeArticleForm();
    }



}
