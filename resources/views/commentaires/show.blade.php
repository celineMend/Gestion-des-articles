<!-- resources/views/articles/commentaires.blade.php -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Commentaires pour {{ $article->nom }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Commentaires pour {{ $article->nom }}</h1>

        <!-- Détails de l'article -->
        <div class="card mb-4">
            <img src="{{ $article->image }}" class="card-img-top" width="100px" height="190px" alt="{{ $article->nom }}">
            <div class="card-body">
                <h5 class="card-title">{{ $article->nom }}</h5>
                <p class="card-text">{{ $article->description }}</p>
                <p class="card-text">{{ $article->a_la_une }}</p>
            </div>
        </div>

        <!-- Liste des commentaires -->
        <h2>Commentaires</h2>
        @if($article->commentaires->isEmpty())
            <p>Aucun commentaire pour cet article.</p>
        @else
            @foreach($article->commentaires as $commentaire)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $commentaire->author }}</h5>
                        <p class="card-text">{{ $commentaire->content }}</p>
                        <p class="card-text"><small class="text-muted">{{ $commentaire->created_at }}</small></p>
                    </div>
                </div>
            @endforeach
        @endif

        <!-- Bouton retour -->
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Retour</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
