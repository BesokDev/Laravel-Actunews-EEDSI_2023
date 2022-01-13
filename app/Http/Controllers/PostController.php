<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PostController extends Controller
{
    public function create()
    {
        return Response::view('post.form', [
            'post' => new Post()
        ]);
    }
}
