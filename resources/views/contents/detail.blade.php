@extends('layouts.app')

@section('main')

<aside class="auth">
    @include('auth.login')
</aside>

<section class="detail_container">
    @if (Str::startsWith($contents->contents_info, 'https://www.youtube.com/'))

    <div class="contents_detail_container">
        <iframe class="contents_detail" src={{$contents->contents_info}}></iframe>
    </div>
    <div class="contents_meta">
        <p>登校日 : {{$contents->created_at}}</p>
        <p>コメント : {{$contents->comment}}</p>
    </div>

    @else

    <div class="contents_detail_container">
        <img class="contents_detail" src="{{'/storage/' . $contents->contents_info}}" alt="image_url">
    </div>
    <div class="contents_meta">
        <p>登校日 : {{$contents->created_at}}</p>
        <p>コメント : {{$contents->comment}}</p>
    </div>

    @endif

</section>
@endsection