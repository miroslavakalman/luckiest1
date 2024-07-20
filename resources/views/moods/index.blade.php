@extends('layouts.app')

@section('content')
<body>
    <h1 class="note-h1">Как вы себя чувствуете?</h1>
    <a   class="a-style" href="{{ route('moods.create') }}">Добавить настроение</a>

    <div class="moods-list">
        @foreach ($moods as $mood)
        <a href="{{ route('moods.show', $mood->id) }}">
            <div class="mood-item">
                <p  class="a-style">{{ $mood->created_at->format('d.m.Y') }}</p>
                <p  class="a-style">Уровень настроения: {{ $mood->mood_level }}</p>
                <p class="a-style">{{ Str::limit($mood->description, 50) }}</p>
                <!-- <a href="{{ route('moods.show', $mood->id) }}"  class="a-style" style="font-size: 14px;">Подробнее</a> -->
                <!-- <a href="{{ route('moods.edit', $mood->id) }}"  class="a-style" style="font-size: 14px;">Редактировать</a>
                <form action="{{ route('moods.destroy', $mood->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form> -->
        </div>
        </a>
        @endforeach
    </div>
@endsection
</body>
