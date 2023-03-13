<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function form($id = null)
    {
        $priorities = Priority::all();
        $task = null;
        if ($id != null) {
            $task = Task::where('id', $id)->first();
        }
        return view('ajax/tasks/create', ['priorities' => $priorities, 'task' => $task]);
    }

    public function store(Request $request,$id = null)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:5000',
            'priority_id' => 'required|exists:priorities,id',
            'deadline' => 'nullable|date_format:d/m/Y',
        ]);
        if($id == null)
            $task = new Task();
        else
            $task = Task::where('id', $id)->first();
//        dd($task);
        $task->title = $request->input('title');
        $task->description = $request->description;
        if($request->deadline != null){
            $newDateFormat = \Carbon\Carbon::createFromFormat('d/m/Y', $request->deadline)->format('Y-m-d');
            $task->deadline = $newDateFormat;
        }

        $task->user_id = Auth::user()->id;
        $task->statut_id = 1;
        $task->priority_id = $request->input('priority_id');
        $task->companie_id = Auth::user()->companie->id;
        $task->save();

        return redirect()->to('/');
    }

    public function get()
    {
        $tasks = Task::where('companie_id', Auth::user()->companie_id)->where('statut_id', '!=', '2')->get();
        return view('ajax/tasks/getTask', ['tasks' => $tasks]);
    }

    public function delete(Request $request)
    {
        if (Task::where('id', $request->id)->where('companie_id', Auth::user()->companie->id)->count() > 0) {
            Task::destroy($request->id);
        } else {
            abort(403);
        }
    }

    public function archive(Request $request)
    {
        $task = Task::where('id', $request->id)->first();
        $task->statut_id = 2;
        $task->save();
        return redirect()->to('/');
    }
}
