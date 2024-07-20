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
<body>
@extends('layouts.app')

@section('content')
    <h1 class="note-h1">Ваши записи</h1>
    <form action="{{ route('notes.store') }}" method="POST" style="margin-left: 20%">
        @csrf
        <label for="text-field-notes" class="field-p"> Добавить новую запись
            <textarea name="content" class="text-field-notes" style="width: 1080px; height:520px"></textarea>
            <button type="submit">Сохранить</button>
        </label>
    </form>
    <h2 class="field-t" style="margin-top: 80px;">Предыдущие записи</h2>
    <div class="old-notes">
        @foreach ($notes as $note)
        <a href="{{ route('notes.show', $note->id) }}" class="note-wr-a">
            <div class="note-wr">
                <p>{{ $note->created_at->format('d. m. Y') }}</p>
                <p>
                    @php
                        $words = explode(' ', $note->content);
                        echo implode(' ', array_slice($words, 0, 2));
                    @endphp
                </p>
            </div>
        </a>
        @endforeach
    </div>
@endsection

</body>
</html>
