<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::where('user_id', Auth::id())->get();
        return view('notes.index', compact('notes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        Note::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return redirect()->route('notes.index');
    }

    public function show($id)
    {
        $note = Note::findOrFail($id);
        if (Gate::denies('view', $note)) {
            abort(403);
        }
        return view('notes.show', compact('note'));
    }

    public function edit($id)
    {
        $note = Note::findOrFail($id);
        if (Gate::denies('update', $note)) {
            abort(403);
        }
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $note = Note::findOrFail($id);
        if (Gate::denies('update', $note)) {
            abort(403);
        }
        $note->update([
            'content' => $request->content,
        ]);

        return redirect()->route('notes.index');
    }

    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        if (Gate::denies('delete', $note)) {
            abort(403);
        }
        $note->delete();

        return redirect()->route('notes.index');
    }
}
