@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <div class="row">
            @foreach($posts as $post)
            <div class="col-4 my-3">
                <div class="card" >
                    <img src="" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <a href="/blog/{{ $post->slug }}" class="btn btn-primary">Подробнее</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>  
@endsection
