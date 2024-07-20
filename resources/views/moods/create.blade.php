@extends('layouts.app')

@section('content')
<body>
    <h1 class="note-h1">Добавить настроение</h1>

    <form action="{{ route('moods.store') }}" method="POST" style="margin-top: 2%;">
        @csrf
        <label for="mood_level" class="a-style">Уровень настроения (1-10):</label>
        <input type="number" name="mood_level" id="mood_level" min="1" max="10" required>

        <label for="description"  class="a-style">Описание:</label>
        <textarea name="description" id="description"></textarea>

        <button type="submit">Сохранить</button>
    </form>
</body>
@endsection