@extends('layouts.app') 

@section('content')
    <div class="container">      
        <div class="card text-center">
            <div class="card-header" style="background-color: #CCCCFF;">
                標題：{{ $post->title }}
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    作者：{{ $post->user->name }}
                </h5>
                <p class="card-text">
                    {{ $post->content }}
                </p>
            </div>
            @if($id_now == $post->user_id)
                <div align="right">
                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">編輯</a>
                    <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">刪除</button>
                    </form>
                </div>
            @endif
            <div class="card-footer text-muted" style="background-color: #CCCCFF;">
                發文日期：{{ $post->created_at }}
            </div>
            <div align="left" >
                <!--a href="{{ route('post.show', $post->id) }}" class="btn btn-secondary">查看留言</a-->
                <details>
                    <summary class="col-form-label text-muted">查看留言......</summary>
                    @foreach ($comments as $key => $comment)
                        <p> {{ $comment->user->name}}&nbsp;說了:</p>
                        <p style="background-color:#B0B0B0;padding:10px;margin-bottom:5px;">{{ $comment->content}}</p>
                        @if($id_now == $comment->user_id)
                            <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">刪除</button>
                            </form>
                        @endif
                    @endforeach
                </details>
                <form action="{{ route('comment.store', $post->id) }}" method="POST">
                    @csrf
                    <div class="form-group row" align="center">
                        <label for="content" class="col-sm-1 col-form-label text-muted">我想說:</label>
                        <div class="col-sm-4">
                            <textarea class="form-control" id="content" name="content" placeholder="input...." type="text">
                            </textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="submit" class="btn btn-primary" value="送出">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection