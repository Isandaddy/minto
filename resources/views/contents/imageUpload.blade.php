@extends('layouts.app')

@section('main')

<aside class="auth">
    @include('auth.login')
</aside>

<section class="image-upload-container">

    <form class="form_container" action="/contents/{{Auth::user()->id}}/images/upload" method="post" enctype="multipart/form-data">

        @csrf

        <div class="meta_container">
            <label for="title">タイトル</label>
            <input type="text" class="form-control" name="title" autofocus>
        </div>

        <div class="meta_container">
            <label for="comment">コメント</label>
            <textarea class="form-control" name="comment"></textarea>
        </div>

        <div class="form-group">
            <label for="image-file">画像</label>
            <input type="file" name='image'>
        </div>

        <button class="btn btn-primary" type="submit">投稿</button>
    </form>

</section>
@endsection