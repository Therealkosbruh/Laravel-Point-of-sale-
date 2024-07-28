<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ПYШКА</title>
</head>
<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="auth-container">
        <div class="auth-container-header">
            <button class="toggle-btn">Toggle</button>
        </div>
        <div class="forms-container">
            <form action="{{ route('loginPost') }}" method="POST" name="sign_in" id="sign_in">
                @csrf
                <h1>Авторизация</h1>
                <div class="inputs">
                    <input type="text" name="login" class="input_tex" placeholder="login" required>
                    <input type="password" name="password" class="input_tex" placeholder="password" required>
                </div>
                <button class="btn" type="submit">Войти</button>
            </form>
            <form action="{{route('user.create')}}" method="POST" name="sign_up" id="sign_up">
                @csrf
                <h1>Регистрация</h1>
                <input type="text" name="last_name" class="input_tex" placeholder="Last name" required>
                <input type="text" name="name" class="input_tex" placeholder="Name" required>
                <input type="text" name="patr" class="input_tex" placeholder="Patronymic" required>
                <input type="email" name="email" class="input_tex" placeholder="Mail" required>
                <input type="text" name="login" class="input_tex" placeholder="Login" required>
                <input type="tel" name="phone" class="input_tex" placeholder="Phone number" required>
                <input type="password" name="password" class="input_tex" placeholder="Password" required>
                <input type="password" name="repeat_password" class="input_tex" placeholder="Repeat password" required>
                {{-- <input type="file" name="img" class="input_tex" required> --}}
                <button class="btn" type="submit">Регистрация</button>
            </form>
        </div>
    </div>
    <script src="{{asset('js/form.js')}}"></script>
</body>
</html>