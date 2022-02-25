<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($id)
    {
        $posts = Post::where("id", $id)->with("user")->get();
        dd($posts[0]->user->email);
    }
}
