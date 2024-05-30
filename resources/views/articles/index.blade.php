<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Interface Utilisateur</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .card-custom {
      height: 100%;
    }
    .card-img-top-custom {
      height: 150px;
      object-fit: cover;
    }
  </style>
</head>
<body>
    <h1>Listes des Articles</h1>
  <div class="container mt-5">
    <a href="/ajouter" class="btn btn-info mb-3">Ajouter</a>
    <ul>
        @foreach ($errors->all() as $error)
            <li class="alert alert-danger">{{ $error }}</li>
        @endforeach
    </ul>
    @if (session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
    @endif

    @php
      $ide = 1;
    @endphp

    <div class="row row-cols-1 row-cols-md-4 g-4">
      @foreach($articles as $article)
        <div class="col">
          <div class="card card-custom h-100">
            <img src="{{ $article->image }}" class="card-img-top card-img-top-custom" alt="Image de l'article">
            <div class="card-body">
              <h5 class="card-title">{{ $article->nom }}</h5>
              <p class="card-text">{{ $article->description }}</p>
              <p class="card-text">{{ $article->a_la_une ? 'À la une' : 'Non à la une' }}</p>
              <a href="/articles/{{ $article->id }}" class="btn btn-info">Voir détail</a><br><br>
              <a href="/modifier/{{ $article->id }}" class="btn btn-warning">Modifier</a><br>
              <button class="btn btn-danger mt-2" onclick="confirmDelete({{ $article->id }})">Supprimer</button>
            </div>
          </div>
        </div>
        @php
          $ide += 1;
        @endphp
      @endforeach
    </div>
  </div>

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
