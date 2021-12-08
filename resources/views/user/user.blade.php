@extends('layouts.app')

@section('main')
<div class="row">
    <aside class="col-md-2">
        @include('auth.login')
    </aside>

    <section class="col-md-10">
        <div class="row">
            <h2 class="select_user">{{$user->name}}</h2>
        </div>
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
                    </div>

                </div>
                @else
                <div class="card">
                    <img class="img-thumbnail card-img-top" src="{{'/storage/' . $content->contents_info}}" alt="image_url">
                    <div class="card-body">
                        <h3>
                            <a class="card-title row" href="/contents/{{ $content->id }}">{{$content->title}}</a>
                        </h3>
                    </div>
                </div>
                @endif
            </li>

            @endforeach
        </ul>
    </section>
    @endsection
</div>