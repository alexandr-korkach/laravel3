@extends('layouts.app')
@section('content')
    <div id="app">
        <article-component></article-component>
        {{--<div class="row mt-5">
            <div class="col-12 p-3">

                <img src="{{$article->img}}" class="border rounded mx-auto d-block" alt="...">
                <h5 class="mt-5">{{$article->title}}</h5>
                <p>
                    @foreach($article->tags as $tag)
                        @if($loop->last)
                            <span class="tag">{{$tag->label}}</span>
                        @else
                            <span class="tag">{{$tag->label}} |</span>
                        @endif
                    @endforeach
                </p>
                <p class="card-text">{{$article->body}}</p>
                <p>Опубликованно:  <i>{{$article->createdAtForHumans()}}</i></p>
                <div class="mt-3">
                    <span class="badge bg-primary">{{ $article->state->likes }} <i class="far fa-thumbs-up"></i></span>
                    <span class="badge bg-danger">{{ $article->state->views }} <i class="far fa-eye"></i></span>
                </div>
            </div>
        </div>--}}
        <hr>
        <comment-component></comment-component>
    </div>

@endsection
@section('vue')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
