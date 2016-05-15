@extends('layouts.app');

@section('content')
    <div style="width: 40%; margin: auto; background-color: #c7ddef">
        {!! link_to_route('posts', 'published') !!} &nbsp;&nbsp;&nbsp;
        {!! link_to_route('posts.unpublished', 'unpublished') !!} &nbsp;&nbsp;&nbsp;
        @if (Auth::guest())
            <a href="{{ url('/register') }}">Зареєструйтесь, щоб додати статтю</a>
        @else
            {!! link_to_route('post.create', 'new') !!}
        @endif
    </div>
<div style="width: 20%; margin: auto">
    @foreach($posts as $post)
        <article>
            <h2>
                {!! $post->title !!}
            </h2>
            <p> {!!  $post->excerpt  !!} </p>
            <p> Published: {{ $post->published_at }} </p>
        </article>
    @endforeach
</div>
@stop
