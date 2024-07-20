@extends('layouts.app')

@section('content')
    <h1  class="note-h1">Редактирование цели</h1>
    <form action="{{ route('goals.update', $goal->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="title" class="field-p">Название:</label>
        <input type="text" name="title" id="title" value="{{ $goal->title }}" required>
        <label for="description" class="field-p">Описание:</label>
        <textarea name="description" id="description" value="{{ $goal->description }}" required>
        <div class="completed">
            <label for="is_completed" class="field-p">Завершено:</label>
            <input type="checkbox" name="is_completed" id="is_completed" {{ $goal->is_completed ? 'checked' : '' }}>
        </div>
        <button type="submit">Сохранить изменения</button>

    </form>
    <form action="{{ route('goals.destroy', $goal->id) }}" method="POST" >
        @csrf
        @method('DELETE')
        <button type="submit">Удалить</button>
    </form>
 
@endsection
