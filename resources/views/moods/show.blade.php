@extends('layouts.app')

@section('content')
<body>
    <h1 class="note-h1">Настроение от {{ $mood->created_at->format('d.m.Y') }}</h1>
    <p class="goal-c">Уровень настроения: {{ $mood->mood_level }}</p>
    <p class="goal-c">Описание: {{ $mood->description }}</p>

    <a href="{{ route('moods.edit', $mood->id) }}"  class="a-style">Редактировать</a>
    <a href="{{ route('moods.index') }}"  class="a-style" style="margin-top: 20px;">Назад</a>

    <form action="{{ route('moods.destroy', $mood->id) }}" method="POST" style="display:flex; padding-right: 0 !important; margin-top: 20px;">
        @csrf
        @method('DELETE')
        <button type="submit">Удалить</button>
    </form>
</body>
@endsection