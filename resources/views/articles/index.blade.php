<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>interface utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container d-flex  gap-5">
        @if (session('status'))
        <div class="alert alert-sucsess">
        {{session('status')}}

        </div>
    @endif
      @foreach($articles as $article)

        <div class="card" style="width: 18rem;">
          <img src="{{$article->image}}" class="card-img-top"width="100" height="150px"alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$article->nom}}</h5>
                <p class="card-text">{{$article->description}}</p>
                <p class="card-text">{{$article->a_la_une}}</p>

                <a href="/ajouter_traitement" class="btn btn-info">Ajouter</a>
                <a href="/update-articles" class="btn btn-info">Update</a>
                <a href="/supprimer-articles" class="btn btn-danger">supprimer</a>

            </div>
          </div>
          @endforeach
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
