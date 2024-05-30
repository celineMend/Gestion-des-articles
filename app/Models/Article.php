<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'description', 'date_creation', 'image'];

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
}
