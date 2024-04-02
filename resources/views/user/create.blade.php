@extends('layout')

@section('css')
    <style>
        .form-register {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
        }
    </style>
@endsection

@section('content')
    <div class="form-register">
        <h2>Register</h2>
        <form action="/" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="username" placeholder="Username" required>
            @if ($errors->has('username'))
                <span class="text-danger">{{ $errors->first('username') }}</span>
            @endif
            <input type="email" name="email" placeholder="Email" required>
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
            <input type="tel" name="phone" placeholder="Số điện thoại" required>
            @if ($errors->has('phone'))
                <span class="text-danger">{{ $errors->first('phone') }}</span>
            @endif
            <input type="password" name="password" placeholder="Mật khẩu" required>
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
            <input type="file" name="image" accept="image*" required/>
            @if ($errors->has('image'))
                <span class="text-danger">{{ $errors->first('image') }}</span>
            @endif
            <input type="submit" value="Đăng ký">
        </form>
    </div>
@endsection
