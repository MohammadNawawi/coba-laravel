<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if(request('category')){
        $coba = 'test';
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' .  $category->name;
        }

        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' .  $author->name;
        }
        return view('blog',[
            "title" => "All Posts" . $title,
            "active" => 'blog',
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(10)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('post',[
            "title" => "Single Post",
            "active" => 'blog',
            "post" => $post,
        ]);
    }
}
