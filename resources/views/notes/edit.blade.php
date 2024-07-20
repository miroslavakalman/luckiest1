@extends('layouts.app')

@section('content')
    <h1 class="note-h1">Редактирование записи</h1>
    <form action="{{ route('notes.update', $note->id) }}" method="POST" style="margin-left: 20%;">
        @csrf
        @method('PUT')
        <label for="text-field-notes" class="field-p">
            <textarea name="content" class="text-field-notes" style="width: 1080px; height:520px">{{ $note->content }}</textarea>
            <button type="submit">Сохранить изменения</button>
        </label>
    </form>

@endsection
