<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mood;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MoodController extends Controller
{
    public function index()
    {
        // Получить все настроения текущего пользователя
        $moods = Mood::where('user_id', Auth::id())->get();
        return view('moods.index', compact('moods'));
    }

    public function getMoodData()
    {
        $moods = Mood::where('user_id', Auth::id())->orderBy('created_at')->get();
        return response()->json($moods);
    }
    

    public function create()
    {
        return view('moods.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'mood_level' => 'required|integer|min:1|max:10',
            'description' => 'nullable|string',
        ]);

        Mood::create([
            'user_id' => Auth::id(),
            'mood_level' => $request->mood_level,
            'description' => $request->description,
        ]);

        return redirect()->route('moods.index')->with('success', 'Mood recorded successfully!');
    }

    public function show(Mood $mood)
    {
        if (Gate::allows('view', $mood)) {
            return view('moods.show', compact('mood'));
        }

        abort(403);
    }

    public function edit(Mood $mood)
    {
        if (Gate::allows('update', $mood)) {
            return view('moods.edit', compact('mood'));
        }

        abort(403);
    }

    public function update(Request $request, Mood $mood)
    {
        if (Gate::allows('update', $mood)) {
            $request->validate([
                'mood_level' => 'required|integer|min:1|max:10',
                'description' => 'nullable|string',
            ]);

            $mood->update([
                'mood_level' => $request->mood_level,
                'description' => $request->description,
            ]);

            return redirect()->route('moods.index')->with('success', 'Mood updated successfully!');
        }

        abort(403);
    }

    public function destroy(Mood $mood)
    {
        if (Gate::allows('delete', $mood)) {
            $mood->delete();
            return redirect()->route('moods.index')->with('success', 'Mood deleted successfully!');
        }

        abort(403);
    }
}
