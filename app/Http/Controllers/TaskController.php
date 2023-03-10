<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest; 
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');

    }

    public function index(Request $request)
    {
        if($request->search) 
        {
            $tasks = Task::where('task', 'LIKE', "%$request->search%")
            ->paginate(3);

            return view('task.index', [
                'data' =>$tasks
            ]);
        }

        $tasks = Task::paginate(3);
        return view('task.index', [
            'data' =>$tasks
        ]);
    }

    public function create()
    {
        return view('task.create');
    }

    public function store(TaskRequest $request)
    {   
        // untuk validasi data harus diisi
        // $request->validate([
        //     'task' => ['required'],
        //     'user' => ['required']
        // ]);

        Task::create([
            'task' => $request->task,
            'user' => $request->user
        ]);

        return redirect('/tasks'); 
        
    }
    public function show($id)
    {
        $task = Task::find($id);
        return $task;
    }

    public function edit($id)
    {
        $task = Task::find($id);

        return view('task.edit', compact('task'));
    }

    public function update(TaskRequest $request, $id)
    {
        // untuk validasi data harus diisi
        // $request->validate([
        //     'task' => ['required'],
        //     'user' => ['required']
        // ]);

        $task = Task::find($id);

        $task->update([
            'task' => $request->task,
            'user' => $request->user
        ]);
        return redirect('/tasks'); 
    }

    public function destroy($id)
    {
        $task = Task::find($id);

        $task->delete();
        
        return redirect('/tasks'); 

    }
}
