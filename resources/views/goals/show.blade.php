@extends('layouts.app')

@section('content')
    <h1 class="note-h1">{{ $goal->title }}</h1>
    <p class="goal-c">{{ $goal->description }}</p>
    <p class="goal-c">{{ $goal->is_completed ? 'Завершено' : 'В процессе' }}</p>
    <a href="{{ route('goals.edit', $goal->id) }}"  class="a-style">Редактировать</a>
    <form action="{{ route('goals.destroy', $goal->id) }}" method="POST" style="display:flex; padding-right: 0 !important; margin-top: 20px;">
        @csrf
        @method('DELETE')
        <button type="submit">Удалить</button>
    </form>
@endsection
