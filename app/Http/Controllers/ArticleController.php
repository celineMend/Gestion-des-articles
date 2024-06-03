<?php

namespace App\Http\Controllers;
use App\Models\Article;

use App\Models\Commentaire;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();// récupération des données
        return view('articles.index' , compact('articles'));
    }

    public function show($id)
    {
        $commentaires = Commentaire::all()->where('article_id', $id);

        $article = Article::findOrFail($id);
        return view('articles.show', compact('article','commentaires'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function ajouter()
    {
        return view('articles.ajouter');
    }
    public function ajouter_traitement(Request $request)
    {
       $request->validate([
           'nom'=>'required',
           'description'=>'required',
            'image'=>'required',
            // 'a_la_une'=>'required|boolean',
        ]);
        $article = new Article();
        $article->nom = $request->nom;
        $article->description = $request->description;
        $article->image = $request->image;
        $article->a_la_une = TRUE;
        $article->date_creation = now();
        $article->save();
        return redirect('/articles')->with('status','L\'article a été ajouter avec success');
    }
    public function modifier_articles($id){
        $articles = Article::find($id);
        return view('articles.modifier', compact('articles'));
    }


    // /**
    //  * Update the specified resource in storage.
    //  */
    public function modifier_articles_traitement(Request $request)
    {
        //        $request->validate([
        //    'nom'=>'resquired',
        //    'description'=>'required',
        //     'image'=>'required',
        //     'a_la_une'=>'required',
        // ]);


    $article = Article::find($request->id);
    $article->nom = $request->nom;
    $article->description = $request->description;
    $article->image = $request->image;
    $article->save();
    return redirect('/articles')->with('status','L\'article a été modifier avec succès');
    }

    public function supprimer_articles($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('/articles')->with('status','L\'article a été supprimer avec succès');

    }
}
