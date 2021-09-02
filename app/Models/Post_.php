<?php

namespace App\Models;

class Post 
{
    private static $blogPost = [
        [
            "title" => "Judul Pertama",
            "slug" => "judul-pertama",
            "author" => "Mohammad",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Error aperiam culpa reiciendis dicta sequi assumenda quidem esse, suscipit minima saepe distinctio officiis doloremque vel ex provident perspiciatis corrupti asperiores doloribus.",
        ],
        [
            "title" => "Judul Kedua",
            "slug" => "judul-kedua",
            "author" => "Nawawi",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Error aperiam culpa reiciendis dicta sequi assumenda quidem esse, suscipit minima saepe distinctio officiis doloremque vel ex provident perspiciatis corrupti asperiores doloribus.",
        ],
    ];

    public static function all()
    {
        return collect(self::$blogPost);
    }

    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
