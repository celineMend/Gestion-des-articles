<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>interface utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div>
        <div class="col s12">
            <h1>Ajouter un article</h1>
            <hr>
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="alert alert-danger">{{ $error }}</li>
                @endforeach
            </ul>
            @if (session('status'))
                <div class="alert alert-sucsess">
                {{session('status')}}

                </div>
            @endif
             <form action="/ajouter/traitement" method="POST" class="form_group">
                @csrf
                <div class="mb-3">
                    <label for="Nom de l'article" class="form-label">Nom de l'article</label>
                    <input type="text" class="form-control" id="Nom de l'article" name="nom">

                </div>
                <div class="mb-3">
                    <label for="Description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="Description" name="description">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">image</label>
                    <input type="url" class="form-control" id="image" name="image">
                </div>
                {{-- <div class="mb-3">
                    <label for="text" class="form-label">à la une</label>
                    <input type="text" class="form-control" id="à la une" name="a_la_une">
                </div> --}}

                <button type="submit" class="btn btn-primary">Soumettre</button>

                <br><br>
                <a href="/articles" class="btn btn-danger">Revenir au article</a>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>


