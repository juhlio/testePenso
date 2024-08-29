<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $tasks = $this->taskService->getAllTasks();
        return view('index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $task = $request->all();
        $task['id'] = uniqid();
        $this->taskService->addTask($task);

        return redirect()->route('index');
    }

    public function edit($id)
    {
        $task = $this->taskService->findTaskById($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $updatedTask = $request->all();
        $this->taskService->updateTask($id, $updatedTask);

        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        $this->taskService->deleteTask($id);
        return redirect()->route('tasks.index');
    }

    public function screenCreateTask(){

         return view('create');

      
    }
}
