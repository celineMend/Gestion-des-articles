<?php

namespace App\Http\Controllers;
use App\Models\Article;

use Illuminate\Http\Request;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index' , compact('articles'));
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
    //    $request->validate([
    //        'nom'=>'resquired',
    //        'description'=>'required',
    //         'image'=>'required',
    //         'a_la_une'=>'required',
    //     ]);
        $article = new Article();
        $article->nom = $request->nom;
        $article->description = $request->description;
        $article->image = $request->image;
        $article->a_la_une = $request-> a_la_une;
        $article->save();
        return redirect('/ajouter')->with('status','L\'article a été ajouter avec success');
    }
    public function modifier_articles($id){
        $articles = Article::find($id);
        return view('articles.modifier', compact('articles'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function modifier_articles_traitement(Request $request, $id)
    {
            //    $request->validate([
    //        'nom'=>'resquired',
    //        'description'=>'required',
    //         'image'=>'required',
    //         'a_la_une'=>'required',
    //     ]);


    $article = Article::find($request->id);
    $article->nom = $request->nom;
    $article->description = $request->description;
    $article->image = $request->image;
    $article->modifier();
    return redirect('/articles')->with('status','L\'article a été modifier avec succès');
    }

    public function supprimer_articles($id)
    {
        $article = Article::find($id);
        $article->supprimer();
        return redirect('/articles')->with('status','L\'article a été supprimer avec succès');

    }
}
