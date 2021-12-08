@extends('layouts.app')

@section('main')
<div class="row">
    <aside class="col-md-2">
        @include('auth.login')
    </aside>

    <section class="col-md-10">
        <ul class="row">
            @foreach($contents as $content)

            <li class="col-md-3">
                @if (Str::startsWith($content->contents_info, 'https://www.youtube.com/'))
                <div class="card">
                    <iframe class="img-rounded card-img-top" src="{{$content->contents_info}}"></iframe>
                    <div class="card-body">
                        <h3>
                            <a class="card-title row" href="/contents/{{ $content->id }}">{{$content->title}}</a>
                        </h3>
                        <a class="user_name row" href="/users/{{$content->user_id}}">{{$content->name}}</a>
                    </div>
                </div>
                @else
                <div class="card">
                    <img class="img-thumbnail card-img-top" src="{{'/storage/' . $content->contents_info}}" alt="image_url">
                    <div class="card-body">
                        <h3>
                            <a class="card-title row" href="/contents/{{ $content->id }}">{{$content->title}}</a>
                        </h3>
                        <a class="user_name row" href="/users/{{$content->user_id}}">{{$content->name}}</a>
                    </div>

                </div>
                @endif
            </li>

            @endforeach
        </ul>
    </section>
    @endsection
</div>