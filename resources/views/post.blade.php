@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="jumbotron">
                    <h1 class="display-4">{{ $post->title }}</h1>
                    <p class="lead">{{ $post->excerpt }}</p>
                    <hr class="my-4">
                    <p>{!! $post->body !!}</p>
                    <p>Опубликованно: {{ $post->created_at }}</p>
                    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                </div>
                <a href="{{ url('/') }}" class="btn btn-info">Назад</a>
                <hr />
                    <h4>Display Comments</h4>
                    @foreach($comments as $comment)
                    <div class="my-2">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">Пользователь: {{ $comment->users->name }}</h5>
                                <p class="card-text">Коммент: {{ $comment->body }}</p>
                            </div>
                        </div>
                        <form method="post" action="{{ route('reply.add') }}" class="my-2">
                            @csrf
                            <div class="form-group">
                                <textarea name="comment_body" id="comment_body" cols="20" rows="2" class="form-control"></textarea>
                                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-info" value="Ответить" />
                            </div>
                        </form>
                        @if($comment->id != $comment->parent_id)
                        @include('partials._comment_replies', ['comments' => $comment->replies])
                        @endif
                    </div>
                    @endforeach
                    <hr />
                    <h4>Add comment</h4>
                    <form method="post" action="{{ route('comment.add') }}">
                        @csrf
                        <div >
                        <input type="text" name="comment_body"  />
                        <input type="hidden" value="{{ $post->author_id }}" name="user_id">
                        <input type="hidden" name="parent_id" value="0">
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        </div>
                        <div >
                            <input type="submit"  value="Add Comment" />
                        </div>
                    </form>
            </div>
        </div>
    </div>
</section>  
@endsection