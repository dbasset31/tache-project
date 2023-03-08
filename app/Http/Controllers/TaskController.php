<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function form()
    {
        $priorities = Priority::all();

        return view('ajax/tasks/create', ['priorities' => $priorities]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'priority_id' => 'required|exists:priorities,id',
            'deadline' => 'nullable|date',
        ]);

        $task = new Task();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->deadline = $request->input('deadline');
        $task->user_id = Auth::user()->id;
        $task->statut_id = 1;
        $task->priority_id = $request->input('priority_id');
        $task->companie_id = Auth::user()->companie->id;
        $task->save();

        return redirect()->to('/');
    }

    public function get()
    {
        $tasks = Task::where('companie_id', Auth::user()->companie_id)->get();
        return view('ajax/tasks/getTask', ['tasks' => $tasks]);
    }

    public function delete(Request $request)
    {
        if (Task::where('id', $request->id)->where('companie_id', Auth::user()->companie->id)->count() > 0) {
            Task::destroy($request->id);
        } else {
            abort(403);
        }
//
    }
}
