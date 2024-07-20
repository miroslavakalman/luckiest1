@extends('layouts.app')

@section('content')
    <h1 class="note-h1">Запись от {{ $note->created_at->format('d. m. Y') }}</h1>
    <a href="{{ route('notes.edit', $note->id) }}" class="a-style">Редактировать</a>
    <form action="{{ route('notes.destroy', $note->id) }}" method="POST"  style="display:inline; margin-left:20%;">
        @csrf
        @method('DELETE')
        <label for="text-field-notes" class="field-p">
            <textarea name="content" class="text-field-notes" style="width: 1080px; height:520px">{{ $note->content }}</textarea>
            <button type="submit">Удалить</button>
            </label>
    </form>
@endsection
