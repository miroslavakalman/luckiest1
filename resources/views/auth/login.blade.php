<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoodPaws - Lucky Helper</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body style="background: var(--secondary-pink);">
@extends('layouts.app')

@section('content')
    <h1 class="register-h1">Вход в аккаунт</h1>
    <form action="{{ route('login') }}" method="POST" style="padding-right: 23%;">
        @csrf
        <input type="email" name="email" placeholder="e-mail" required>
        <input type="password" name="password" placeholder="пароль" required>
        <button type="submit">Войти</button>
    </form>
@endsection
</body>
</html>