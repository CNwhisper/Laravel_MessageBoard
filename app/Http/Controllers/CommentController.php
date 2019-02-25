<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Repositories\PostRepository;
use App\Repositories\CommentRepository;
use Illuminate\Http\Request;
use App\Entities\Post;
use App\Entities\Comment;
use App\User;

class CommentController extends Controller
{
    protected $commentRepo;

    public function __construct(CommentRepository $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }

    public function index()
    {

    }

    // ...略

    public function show($id)
    {

    }

    public function destroy($id)
    {
        $result = $this->commentRepo->delete($id);
        //dd($result);
        if ($result) {
            return back();//redirect()->route('post.index');
        }
        return back();
    }

    public function create()
    {
        //return view('post.create');
    }

    public function store(Request $request, Post $post)
    {
        $this->validate($request, [
            'content' => 'required|max:1000'
        ]);
            //return $post->all();
            $comment = new Comment();
            $comment->content = $request->content;
            $comment->user_id = Auth::id();
            //$comment->post_id = 99;
    
            $post->comments()->save($comment); 
        return back();
    }

    public function edit($id)
    {

    }

    public function update($id)
    {

    }
}