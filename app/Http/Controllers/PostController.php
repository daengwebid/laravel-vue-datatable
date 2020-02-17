<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy(request()->sortby, request()->sortbydesc)
            ->when(request()->q, function($posts) {
                $posts = $posts->where('title', 'LIKE', '%' . request()->q . '%')
                    ->orWhere('author', 'LIKE', '%' . request()->q . '%')
                    ->orWhere('category', 'LIKE', '%' . request()->q . '%');
        })->paginate(request()->per_page);
        return response()->json(['status' => 'success', 'data' => $posts]);
    }
}
