<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function showHomePage()
    {
        $posts = Post::latest()->take(3)->get();
        return $posts;
    }
}
