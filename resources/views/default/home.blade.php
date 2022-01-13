@extends('layouts/base')

@section('body')

    <div class="row">
        <div class="col-6 mx-auto">
            <h1 class="text-center">Bienvenue sur Actunews</h1>
        </div>
    </div>
{{--{{ dump(session()) }}--}}
    @if(session('success'))
        <div class="row">
            <div class="col-10 mx-auto">
                <div class="alert alert-success">
                    {!! session('success') !!}
                </div>
            </div>
        </div>
    @endif

    <div class="row">

        @foreach($posts as $post)
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset("storage/posts/$post->photo") }}" class="card-img-top" alt="Photo manquante">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="{{ route('post.show', ['id' => $post->id]) }}" class="btn btn-primary">Voir l'article</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
