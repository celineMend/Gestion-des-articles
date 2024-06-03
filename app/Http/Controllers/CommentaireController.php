<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function sauvegarder(Request $request  )

    {
        $commentaire = new commentaire();
        $commentaire->nom_complet_auteur= $request->nom_complet_auteur;
        $commentaire->contenu= $request->contenu;
        $commentaire->article_id= $request->article_id;
        $commentaire->save();
        return  redirect()->back();




        // $validated = $request->validate([
        //    'nom_complet_auteur' => 'required',
        //     'contenu' => 'required',
        // ]);
        // $validated['article_id'] = $articleId;
        // commentaire::create($validated);
        // return redirect()->route('article.detail',$articleId);


    }
    public function destroy($id)
    {
        $commentaire = Commentaire::find($id);
        $commentaire->delete();

        return redirect('/commentaires')->with('status', 'Commentaire supprimé avec succès.');
    }
}
