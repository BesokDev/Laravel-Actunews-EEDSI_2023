<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DefaultController extends Controller
{
    public function home()
    {
        return Response::view("default.home");
    }
}
