@extends('layouts.app')

@section('main')

<aside class="auth">
    @include('auth.login')
</aside>

<section class="main_container">
    <h2 class="select_user">{{$user->name}}</h2>
    <ul class="contents_list">
        @foreach($contents as $content)

        <li class="contents_container">
            @if (Str::startsWith($content->contents_info, 'https://www.youtube.com/'))
            <div class="contents">
                <iframe class="thumbnail" src="{{$content->contents_info}}"></iframe>
                <a class="contents_title" href="/contents/{{ $content->id }}">{{$content->title}}</a>
            </div>
            @else
            <div class="contents">
                <img class="thumbnail" src="{{'/storage/' . $content->contents_info}}" alt="image_url">
                <a class="contents_title" href="/contents/{{ $content->id }}">{{$content->title}}</a>
            </div>
            @endif
        </li>

        @endforeach
    </ul>
</section>
@endsection