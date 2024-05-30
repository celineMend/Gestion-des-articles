<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function index()
    {
        $commentaires = Commentaire::all('article')->get();

        return view('commentaires.index', compact('commentaires'));

    }


    public function show_commentaires($id)
    {
        $article = Article::find($id);
        if (!$articles) {
            return redirect()->back()->with('status', 'Article not found');
        }
        return view('articles.commentaires', ['article' => $article]);
    }



    public function ajouter()
    {
        return view('commentaires.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function ajouter_traitement(Request $request)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'contenu' => 'required',
        ]);

        $Commentaire = new Commentaire();
        $commentaire->contenu = $request->contenu;
        $commentaire->save();
        return redirect('/commentaires')->with('status','commentaire a été ajouter avec success');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $commentaire = Commentaire::find($id);
        $articles = Article::all();
        return view('commentaires.edit', compact('commentaire', 'articles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'contenu' => 'required',
        ]);

        $commentaire = Commentaire::find($id);
        $commentaire->article_id = $request->article_id;
        $commentaire->contenu = $request->contenu;
        $commentaire->save();

        return redirect('/commentaires')->with('status', 'Commentaire mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $commentaire = Commentaire::find($id);
        $commentaire->delete();

        return redirect('/commentaires')->with('status', 'Commentaire supprimé avec succès.');
    }
}
