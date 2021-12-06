<section class="auth__container">
    @guest
    <div class="auth__title">
        Sign in
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <label for="email">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <p class="err_massage" role="alert">
                <strong>{{ $message }}</strong>
            </p>
            @enderror
        </div>

        <label for="password">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
            <p class="err_massage" role="alert">
                <strong>{{ $message }}</strong>
            </p>
            @enderror
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ __('Login') }}
        </button>
        <a href="{{ route('register') }}">Register</a>

    </form>
    @endguest

    @auth

    <div class="auth__title">{{Auth::user()->name}}さんようこそ！</div>
    <button><a href="/contents/{{Auth::user()->id}}/images/upload">画像をアップロード</a></button>
    <button><a href="/contents/{{Auth::user()->id}}/images/contribution">画像を投稿</a></button>
    <button><a href="/contents/{{Auth::user()->id}}/videos/contribution">動画を投稿</a></button>

    <button type="submit" onclick="document.querySelector('#logout-form').submit();">ログアウト</button>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    @endauth
</section>