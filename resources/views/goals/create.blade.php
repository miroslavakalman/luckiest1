@extends('layouts.app')

@section('content')
    <h1 class="note-h1">Добавить новую цель</h1>
    <form action="{{ route('goals.store') }}" method="POST">
        @csrf
        <label for="title" class="field-p">Название:</label>
        <input type="text" name="title" id="title" required>
        
        <label for="description" class="field-p">Описание:</label>
        <textarea name="description" id="description"></textarea>
        
        <button type="submit">Сохранить</button>
    </form>
@endsection
