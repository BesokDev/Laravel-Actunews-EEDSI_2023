@extends('layouts/base')

@section('body')

    <div class="row">
        <div class="col-6 mx-auto">
            <h1 class="text-center">Ajouter un article</h1>
        </div>
    </div>

    <form action="" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="row my-5">
            <div class="col-6 mx-auto">
                <div class="form-group">

                    <label for="title" class="form-label">Titre</label>
                    <input type="text"
                           id="title"
                           name="title"
                           value=""
                           placeholder="Le titre de votre article"
                           class="form-control">
                    <small class="form-text text-muted">Quel est le titre de votre article</small>


                </div>

                <div class="form-group mt-3">
                    <label for="category" class="form-label">Catégorie</label>
                    <select id="category" name="category" class="form-control">

                        @foreach(\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach

                    </select>
                    <small class="form-text text-muted">Choisissez la catégorie de votre article</small>

                </div>

                <div class="form-group mt-3">
                    <label for="content" class="form-label">Contenu</label>
                    <textarea name="content"
                              id="content"
                              class="form-control"
                              placeholder="Contenu de votre article"
                              cols="30" rows="10"></textarea>
                    <small class="text-muted form-text">Saisissez le contenu de votre article</small>

                </div>

                <div class="form-group mt-3">
                    <label for="featuredImage" class="form-label">Photo d'illustration</label>
                    <input type="file"
                           id="featuredImage"
                           name="featuredImage"
                           value=""
                           class="form-control">
                    <small class="form-text text-muted">Choisissez l'illustration de votre article</small>

                </div>

                <button type="submit" class="btn btn-primary mt-5 d-block mx-auto">Valider</button>

            </div>
        </div>

    </form>

@endsection
