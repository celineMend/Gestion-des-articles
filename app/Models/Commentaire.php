<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commentaire extends Model
{
    use HasFactory;
    protected $fillable = ['article_id', 'contenu','nom_complet_auteur'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
