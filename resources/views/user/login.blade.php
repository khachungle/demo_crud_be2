@extends('layout')

@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Màn hình đăng nhập</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.authUser') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <div style="display: flex; align-items: center;">
                                    <label for="email" style="min-width: 100px;">Email:</label>
                                    <input type="text" placeholder="Email" id="email" class="form-control" name="email" required autofocus>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <div style="display: flex; align-items: center;">
                                    <label for="password" style="min-width: 100px;">Mật khẩu:</label>
                                    <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Ghi nhớ đăng nhập
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col" style="text-align: right;">
                                    <button type="button" class="text-primary" style="border: none; background: none">Quên mật khẩu</button>
                                    <button type="submit" class="btn btn-primary btn-block text-white">Đăng nhập</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
