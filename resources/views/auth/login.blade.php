<section class="container">
    @guest
    <h3 class="auth__title">
        Sign in
    </h3>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <label class="label label-primary" for="email">{{ __('E-Mail Address') }}</label>

        <div class="form-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

            @error('email')
            <p class="err_massage" role="alert">
                <small>{{ $message }}</small>
            </p>
            @enderror
        </div>

        <label class="label label-primary" for="password">{{ __('Password') }}</label>

        <div class="form-group">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

            @error('password')
            <p class="err_massage" role="alert">
                <small>{{ $message }}</small>
            </p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            {{ __('Login') }}
        </button>
        <a href="{{ route('register') }}">Register</a>

    </form>
    @endguest

    <!-- ログインしたら表示する -->
    @auth
    <div class="row-vh d-flex flex-column">
        <h5 class="auth__title"><mark>{{Auth::user()->name}}</mark>さんようこそ！</h5>
        <a class="btn btn-primary btn-space" href="/contents/{{Auth::user()->id}}/images/upload">画像をアップロード</a>
        <a class="btn btn-primary btn-space" href="/contents/{{Auth::user()->id}}/images/contribution">画像を投稿</a>
        <a class="btn btn-primary btn-space" href="/contents/{{Auth::user()->id}}/videos/contribution">動画を投稿</a>

        <button class="btn btn-space" type="submit" onclick="document.querySelector('#logout-form').submit();">ログアウト</button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    @endauth

</section>