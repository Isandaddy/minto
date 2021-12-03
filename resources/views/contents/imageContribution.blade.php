@extends('layouts.app')

@section('main')

<aside class="auth">
    @include('auth.login')
</aside>

<section class="image-contribution-container">

    <form action="/contents/{{Auth::user()->id}}/images/contribution" method="post" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" class="form-control input-sm" name="title" autofocus>
        </div>

        <div class="form-group">
            <label for="comment">コメント</label>
            <textarea class="form-control input-sm" name="comment"></textarea>
        </div>

        <div class="form-group">
            <label for="imagUrl">画像URL</label>
            <input type="text" class="form-control input-sm" name="url">
        </div>

        <button class="btn btn-primary" type="submit">投稿</button>
    </form>

</section>
@endsection