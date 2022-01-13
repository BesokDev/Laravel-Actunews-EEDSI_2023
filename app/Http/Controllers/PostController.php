<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    public function create()
    {
        return Response::view('post.form', [
            'post' => new Post()
        ]);
    }

    public function store(PostRequest $request)
    {
        # 2eme Façon => php artisan make:request PostRequest
            // => injection de dépendance à la prace de Request

        # 1ere Façon => La VALIDATION du formulaire peut s'effectuée dans le Controller
//        try {
//            $this->validate(Request::capture(), [
//                'title' => 'bail|required|max:255',
//                'content' => 'required',
//                'photo' => 'bail|image|mimes:jpeg,jpg,png|max:3072' // 3072 = 3 Mo
//            ]);
//        } catch(ValidationException $exception) {
//            return back();
//        }

        # Récupération de la catégorie (on récupère un objet de Model\Category)
        $category = Category::findOrFail($request->input('category'));

        # Génération de l'alias grâce à la méthode slug() de Illuminate\Support\Str
        $alias = Str::slug($request->input('title'));

        // Upload de la photo ------------------------->

        # Récupère depuis la requête le fichier uploadé. La méthode file() nous retourne un objet de type UploadedFile.
        $photo = $request->file('photo') ?? null;

        if($photo !== null) {
            # Variabilise l'extension du fixhier uploadé grâce à la méthode guessExtension() de UploadedFile.
            // => cet appel est de confiance car la méthode s'appuie sur le mimeType du fichier.
            $extension = $photo->guessExtension();

            # Récupération du nom original du fichier uploadé.
            $originalFilename = str_replace(".$extension", '', $photo->getClientOriginalName());

            # Génération d'un nouveau nom de fichier avec l'alias de l'article et l'extension variabilisée.
            $newFilename = $originalFilename . '_' . uniqid() . '.' . $extension;

            # La méthode storeAs() vous permet de déplacer le fichier dans le dossier que vous spécifiez en premier arg
            // => Elle vous permet de renommer le fichier qui va $etre déplacer dans le filesystem.
            $photo->storeAs('public/posts', $newFilename);
        }
        // Création du nouvel article Post ------------------>

        $post = new Post();

        $post->title = $request->input('title');
        $post->alias = $alias;
        $post->content = $request->input('content');
        $post->photo = $newFilename ?? '';
        // Les relations
        $post->category()->associate($category);
        $post->user()->associate(1);
        // Enregistrement en BDD
        $post->save();

        return Response::redirectToRoute('default.home')->withSuccess('Votre article est en ligne !');
    }
}
