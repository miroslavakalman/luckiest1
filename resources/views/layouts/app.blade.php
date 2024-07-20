<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MoodPaws - Lucky Helper</title>
    <link rel="icon" href="{{ asset('paw-icon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <menu>
        <nav>
            <p><a href="#">Главная</p></a>
            <p><a href="#about">О Лаки</p></a>
            <p><a href="#services">Поддержка</p></a>
            <p><a href="#blog">Блог</p></a>

            @guest
                <a href="{{ route('register') }}"><p>Регистрация</p></a>
                <a href="{{ route('login') }}"><p>Вход</p></a>
            @else
                <a href="{{ route("login") }}"><p>Аккаунт</p></a>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><p>Выход</p></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </nav>
    </menu>

    @yield('content')

    <footer>
        <p>Политика использования</p>
        <p>Конфиденциальность информации</p>
        <p>+7 (495) 000-00-00</p>
    </footer>
</body>
</html>
