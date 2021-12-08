@extends('layouts.app')

@section('main')
<div class="row">
    <aside class="col-md-2">
        @include('auth.login')
    </aside>

    <section class="col-md-10">
        @if (Str::startsWith($contents->contents_info, 'https://www.youtube.com/'))
        <div class="container-fluid">
            <div class="row align-items-center">
                <iframe class="col-md-8 img-rounded" src={{$contents->contents_info}} height="550"></iframe>
                <div class="col-md-4 mx-auto">
                    <p>登校日 : {{$contents->created_at}}</p>
                    <p>コメント : {{$contents->comment}}</p>
                </div>
            </div>
        </div>

        @else
        <div class="container-fluid">
            <div class="row align-items-center">
                <img class="col-md-8 img-rounded" src="{{'/storage/' . $contents->contents_info}}" alt="image_url" height="550">
                <div class="col-md-4 mx-auto">
                    <p>登校日 : {{$contents->created_at}}</p>
                    <p>コメント : {{$contents->comment}}</p>
                </div>
            </div>
        </div>
        @endif

    </section>
    @endsection
</div>