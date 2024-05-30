
<div class="container">
    <h1>{{ $article->nom }}</h1>
    <p>{{ $article->description }}</p>

    <h2>Commentaires</h2>
    @foreach ($article->commentaires as $commentaire)
        <div class="mb-2">
            <strong>{{ $commentaire->author }}</strong>
            <p>{{ $commentaire->content }}</p>
            <hr>
        </div>
    @endforeach

    <h2>Ajouter un commentaire</h2>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('show_commentaires', $article->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="author" class="form-label">Auteur</label>
            <input type="text" class="form-control" id="author" name="author">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Commentaire</label>
            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>
</div>

