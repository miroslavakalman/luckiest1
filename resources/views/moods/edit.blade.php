@extends('layouts.app')

@section('content')
<body>
    <h1 class="note-h1">Редактировать настроение</h1>

    <form action="{{ route('moods.update', $mood->id) }}" method="POST"  style="margin-top: 7%;">
        @csrf
        @method('PUT')

        <label for="mood_level" class="a-style">Уровень настроения (1-10):</label>
        <input type="number" name="mood_level" id="mood_level" min="1" max="10" value="{{ $mood->mood_level }}" required>

        <label for="description" class="a-style">Описание:</label>
        <textarea name="description" id="description">{{ $mood->description }}</textarea>

        <button type="submit">Сохранить изменения</button>
        <a href="{{ route('moods.index') }}" class="a-style" style="font-size: 16px;">Назад</a>

    </form>
</body>
@endsection