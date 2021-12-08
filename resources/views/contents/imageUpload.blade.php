@extends('layouts.app')

@section('main')
<div class="row">
    <aside class="col-md-2">
        @include('auth.login')
    </aside>

    <section class="col-md-7">

        <form class="form_container" action="/contents/{{Auth::user()->id}}/images/upload" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            @csrf

            <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') ? old('title') : '' }}">
                @error('title')
                <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="comment">コメント</label>
                <textarea class="form-control" name="comment">{{ old('comment') ? old('comment') : '' }}</textarea>
                @error('comment')
                <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="image-file">画像</label>
                <input type="file" name='image'>
                @error('image')
                <small>{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">投稿</button>
        </form>

    </section>
    @endsection
</div>