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
            <input type="text" class="form-control" name="title" value="{{ old('title') ? old('title') : '' }}">
            @error('title')
            <small>{{ $message }}</small>
            @enderror
        </div>

        <div class="meta_container">
            <label for="comment">コメント</label>
            <textarea class="form-control" name="comment">{{ old('comment') ? old('comment') : '' }}</textarea>
            @error('comment')
            <small>{{ $message }}</small>
            @enderror
        </div>

        <div class="meta_container">
            <label for="youtube-url">youtube URL</label>
            <input type="text" class="form-control" name="youtubeUrl">
            @error('youtubeUrl')
            <small>{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary" type="submit">投稿</button>
    </form>

</section>
@endsection