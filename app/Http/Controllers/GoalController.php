<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
    public function index()
    {
        $goals = Goal::where('user_id', Auth::id())->get();
        return view('goals.index', compact('goals'));
    }

    public function create()
    {
        return view('goals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Goal::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('goals.index');
    }

    public function show($id)
    {
        $goal = Goal::findOrFail($id);
        if ($goal->user_id != Auth::id()) {
            abort(403);
        }
        return view('goals.show', compact('goal'));
    }

    public function edit($id)
    {
        $goal = Goal::findOrFail($id);
        if ($goal->user_id != Auth::id()) {
            abort(403);
        }
        return view('goals.edit', compact('goal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        $goal = Goal::findOrFail($id);
        if ($goal->user_id != Auth::id()) {
            abort(403);
        }
    
        $goal->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => $request->has('is_completed'),  // обработка чекбокса
        ]);
    
        return redirect()->route('goals.index');
    }
    

    public function destroy($id)
    {
        $goal = Goal::findOrFail($id);
        if ($goal->user_id != Auth::id()) {
            abort(403);
        }
        $goal->delete();

        return redirect()->route('goals.index');
    }
}
