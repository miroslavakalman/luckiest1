<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
@extends('layouts.app')

@section('content')
<div class="acc-wrapper">
<h1>Привет, {{ Auth::user()->name }}</h1>
<div class="acc-blocks">
        <a href="{{ route('notes.index') }}" class="acc-block">
            <p>Ваши записи</p>
            <img src="img/image 8.png" alt="">
        </a>
        <a href="{{ route('goals.index') }}" class="acc-block-mini">
            <p>Ваши цели и задачи</p>
            <img src="img/image 9.png" alt="">
        </a>
        <a href="{{ route('moods.index') }}" class="acc-block-mini">
            <p>Трекер настроения</p>
            <img src="img/image 9-1.png" alt="">
        </a>
    </div>
</div>
@endsection
</body>
</html>
