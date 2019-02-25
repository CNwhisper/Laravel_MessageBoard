@extends('layouts.app') 

@section('content')
    <div class="container">
        <div align="center">
            <a href="{{ route('post.create') }}" class="btn btn-primary">我要貼文</a>
        </div>

        @foreach ($posts as $key => $post)
            <div class="card text-center" >
                <div class="card-header" style="background-color: #CCCCFF;">
                    標題：{{ $post->title }}
                </div>
                <div class="card-body" style="background-color: #CCDDFF;">
                    <h5 class="card-title">
                        作者：{{ $post->user->name }}
                    </h5>
                    <a href="{{ route('post.show', $post->id) }}" class="btn btn-secondary">查看文章</a>
                </div>
                <div class="card-footer text-muted" style="background-color: #CCCCFF;">
                    發文日期：{{ $post->created_at }}
                </div>
            </div><br>
        @endforeach
    </div>
@endsection