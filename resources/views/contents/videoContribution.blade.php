@extends('layouts.app')

@section('main')

<aside class="auth">
    @include('auth.login')
</aside>

<section class="video-contribution-container">

    <form class="form_container" action="/contents/{{Auth::user()->id}}/videos/contribution" method="post" enctype="multipart/form-data">

        @csrf

        <div class="meta_container">
            <label for="title">タイトル</label>
            <input type="text" class="form-control" name="title" autofocus>
        </div>

        <div class="meta_container">
            <label for="comment">コメント</label>
            <textarea class="form-control input-sm" name="comment"></textarea>
        </div>

        <div class="meta_container">
            <label for="image-url">youtube URL</label>
            <input type="text" class="form-control" name="url">
        </div>

        <button class="btn btn-primary" type="submit">投稿</button>
    </form>

</section>
@endsection