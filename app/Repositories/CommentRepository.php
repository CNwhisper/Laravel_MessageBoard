<?php

namespace App\Repositories;

use App\Entities\Comment;

class CommentRepository
{
    public function index($id)
    {
        return Comment::with('post')->with('user')->where('post_id', '=', $id)->get();
    }

    public function find($id)
    {
        return Comment::with('post')->find($id);
    }

    public function create(array $data)
    {
        return auth()->user()->posts()->comments()->create($data);
    }
    public function delete($id)
    {
        return Comment::destroy($id);
    }
}