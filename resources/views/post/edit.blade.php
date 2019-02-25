@extends('layouts.app') 

@section('content')
    <div class="container">
        <form action="{{ route('post.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group row">
                <label for="title" class="col-sm-1 col-form-label">標題</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="content" class="col-sm-1 col-form-label">內容</label>
                <div class="col-sm-4">
                    <textarea class="form-control" id="content" name="content">{{ $post->content }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="submit" class="btn btn-primary" value="送出">
                </div>
            </div>
        </form>
    </div>
@endsection