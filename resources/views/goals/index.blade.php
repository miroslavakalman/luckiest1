@extends('layouts.app')

@section('content')
    <h1 class="note-h1">Ваши цели и задачи</h1>
    <a href="{{ route('goals.create') }}"  class="a-style">Добавить новую цель</a>
    <div class="goals">
        @foreach ($goals as $goal)
        <a href="{{ route('goals.show', $goal->id) }}">
            <div class="goal">
                <p>{{ $goal->title }}</p>
                <p>{{ $goal->is_completed ? 'Завершено' : 'В процессе' }}</p>
            </div>
            </a>
        @endforeach
    </div>
@endsection
