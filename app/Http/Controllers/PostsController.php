<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    static $allPosts = [
        ['id' => 1, 'title' => 'Laravel', 'posted_by' => 'Otyl', 'created_at' => '2021-03-20'],
        ['id' => 2, 'title' => 'Express', 'posted_by' => 'Michael', 'created_at' => '2021-04-15'],
        ['id' => 3, 'title' => 'Django', 'posted_by' => 'John', 'created_at' => '2021-06-01'],
    ];

    public function index()
    {
        return view('posts.index', [
            'posts' => self::$allPosts
        ]);
    }

    public function show($postId){
        $post = ['id' => 1, 'title' => 'laravel', 'description' => 'laravel is awesome framework', 'posted_by' => 'Otyl', 'created_at' => '2021-03-20'];
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        return redirect()->route('posts.index');
    }
}