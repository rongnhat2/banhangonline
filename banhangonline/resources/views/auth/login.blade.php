<!DOCTYPE html>
<html>
    <head>
        <title>Admin-Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/style-overview.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body> 
        <div class="I-login_wrapper">
            <div class="bg_wrapper">
                <div class="top"> </div>
                <div class="image">
                    <img src="{{ asset('images/bg_login.png') }}">
                </div>
            </div>
            <div class="form_login">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email Đăng Nhập</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Mật Khẩu</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Đăng Nhập
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
