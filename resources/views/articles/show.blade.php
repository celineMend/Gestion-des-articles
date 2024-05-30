<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Détail de : {{ $article->nom}}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .card-custom {
            height: 100%;
        }
        .card-img-top-custom {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic">{{ $article->nom }}</h1>
            </div>
        </div>
    </div>
    <br><br>
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    {{ $article->nom }}
                </h3>

                <div class="blog-post">
                    <p class="blog-post-meta">January 1, 2014 by <a href="#">Samba</a></p>
                    <p> {{ $article->description }} </p>
                </div><!-- /.blog-post -->
            </div><!-- /.blog-main -->

            <aside class="col-md-4 blog-sidebar">
                <div class="p-3 mb-3 bg-light rounded">
                    <h4 class="font-italic">About</h4>
                    <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                </div>
            </aside><!-- /.blog-sidebar -->
        </div><!-- /.row -->
        <hr>

        <div class="container mt-5">
            <h1>Commentaires</h1>
            @foreach ($commentaires as $commentaire)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $commentaire->nom_complet_auteur }}</h5>
                        <p class="card-text">{{ $commentaire->contenu }}</p>
                    </div>
                </div>
            @endforeach

            <h3>Ajouter un commentaire</h3>
            <form action="/commentaires/sauvegarder" method="POST">
                @csrf
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <div class="mb-3">
                    <label for="nom_complet_auteur" class="form-label">Présentez-vous</label>
                    <input type="text" class="form-control" id="nom_complet_auteur" name="nom_complet_auteur" required>
                </div>
                <div class="mb-3">
                    <label for="contenu" class="form-label">Laissez un message</label>
                    <textarea class="form-control" id="contenu" name="contenu" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>

    </main><!-- /.container -->

    <footer class="blog-footer">
        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="/articles">Accueil</a>
            <a class="btn btn-outline-secondary" href="/articles/partager">Partager</a>
        </nav>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function confirmDelete(id) {
            const confirmed = confirm(`Êtes-vous sûr de vouloir supprimer l'article avec l'ID ${id} ?`);
            if (confirmed) {
                window.location.href = `/supprimer/${id}`;
            }
        }
    </script>
</body>
</html>
