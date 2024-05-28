<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>interface utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="col s12">
            <h1>modifier un article</h1>
            <hr>
            @if (session('status'))
                <div class="alert alert-success">
                {{session('status')}}

                </div>
            @endif
             <form action="/articles.modifier_traitement" method="POST" class="form_group">
                @csrf
                <input type="hidden" name="id" style="display:none;"value="{{$articles->id}}">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom de l'article</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{$articles->nom}}">

                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{$articles->description}}">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">image</label>
                    <input type="url" class="form-control" id="image" name="image" value="{{$articles->image}}">
                </div>


                <button type="submit" class="btn btn-primary">modifier un article</button>

                <br><br>
                <a href="/articles" class="btn btn-danger">à la une</a>
                <a href="/articles" class="btn btn-danger">Revenir au article</a>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>


