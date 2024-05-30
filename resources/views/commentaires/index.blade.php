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



      @section('content')
          <h1>Articles</h1>
          <a href="{{ route('articles.ajouter') }}">Créer un nouvel article</a>
          <ul>
              @foreach ($articles as $article)
                  <li>
                      <a href="{{ route('articles.show', $article->id) }}">{{ $article->name }}</a>
                      <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit">Supprimer</button>
                      </form>
                  </li>
              @endforeach
          </ul>
      @endsection


      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
