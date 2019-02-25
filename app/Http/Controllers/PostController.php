<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Repositories\PostRepository;
use App\Repositories\CommentRepository;
use App\Entities\Comment;
use App\Entities\User;

class PostController extends Controller
{
    protected $postRepo;
    protected $commentRepo;
    public function __construct(PostRepository $postRepo, CommentRepository $commentRepo)
    {
        $this->postRepo = $postRepo;
        $this->commentRepo = $commentRepo;
    }

    public function index()
    {
        $posts = $this->postRepo->index();
        return view('post.index', ['posts' => $posts]);
    }

    public function show($id)
    {
        $auth_id = Auth::id();
        $post = $this->postRepo->find($id);
        $comment = $this->commentRepo->index($id);
        //return $comment->all();
        //dd($this);
        if (!$post) {
            return redirect()->route('post.index');
        }
        return view('post.show', ['post' => $post, 'comments' => $comment, 'id_now' => $auth_id]);
    }

    public function destroy($id)
    {
        $result = $this->postRepo->delete($id);
        
        if ($result) {
            return redirect()->route('post.index');
        }
        
        return back();
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $post = $this->postRepo->create(request()->only('title', 'content'));
        
        if ($post) {
            return redirect()->route('post.show', $post->id);
        }
        
        return back();
    }

    public function edit($id)
    {
        $post = $this->postRepo->find($id);

        if (!$post) {
            return redirect()->route('post.index');
        }
        return view('post.edit', ['post' => $post]);
    }

    public function update($id)
    {
        $result = $this->postRepo->update($id, request()->only('title', 'content'));

        if (!$result) {
            return redirect()->route('post.index');
        }
        return redirect()->route('post.show', $id);
    }
}