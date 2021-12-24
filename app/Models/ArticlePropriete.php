<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticlePropriete extends Model
{
    use HasFactory;

    public $table = "articles_propriete";
    public $fillable = [
        "article_id", "propriete_article_id", "valeur"
    ];
}
