<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use App\Entities\Post;
use App\Entities\Comment;

class PostRepository
{
    public function index()
    {
        return Post::with('user')->get();
    }

    public function find($id)
    {
        return Post::with('user')->find($id);
    }

    public function create(array $data)
    {
        return auth()->user()->posts()->create($data);
    }

    public function create_comment(array $data)
    {
        dd(auth()->user()->posts());
       
        return auth()->user()->posts()->comments()->create($data);
    }

    public function update($id, array $data)
    {
        $post = Post::find($id);
        return $post ? $post->update($data) : false;
    }
    
    public function delete($id)
    {
        return Post::destroy($id);
    }
}