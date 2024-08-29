<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        // Validação dos dados recebidos
        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date_format:Y-m-d|after_or_equal:today',
        ], [
            'due_date.after_or_equal' => 'A data não pode ser anterior a hoje.',
        ]);

        // Verifica se a data está expirada
        if (Carbon::parse($request->input('due_date'))->isPast()) {
            return redirect()->back()->withErrors(['due_date' => 'A data limite não pode estar no passado.']);
        }

        // Adiciona a nova tarefa
        $task = $request->all();
        $task['id'] = uniqid();
        $this->taskService->addTask($task);

        return redirect()->route('index');
    }

    public function edit($id)
    {
        $task = $this->taskService->findTaskById($id);

        try {
            $dueDate = Carbon::createFromFormat('Y-m-d', $task['due_date']);
        } catch (\Exception $e) {
            try {
                $dueDate = Carbon::createFromFormat('d/m/Y', $task['due_date']);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Formato de data inválido.');
            }
        }

        // Verifica se a data da tarefa está atrasada
        $isExpired = Carbon::now()->isAfter($dueDate);

        return view('update', compact('task', 'isExpired'));
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados recebidos
        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date_format:Y-m-d|after_or_equal:today',
        ], [
            'due_date.after_or_equal' => 'A data não pode ser anterior a hoje.',
        ]);

        // Verifica se a data está expirada
        if (Carbon::parse($request->input('due_date'))->isPast()) {
            return redirect()->back()->withErrors(['due_date' => 'A data limite não pode estar no passado.']);
        }

        // Atualiza a tarefa
        $updatedTask = $request->all();
        $this->taskService->updateTask($id, $updatedTask);

        // Recupera a tarefa atualizada para mostrar detalhes
        $task = $this->taskService->findTaskById($id);

        try {
            $dueDate = Carbon::createFromFormat('Y-m-d', $task['due_date']);
        } catch (\Exception $e) {
            try {
                $dueDate = Carbon::createFromFormat('d/m/Y', $task['due_date']);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Formato de data inválido.');
            }
        }

        $today = Carbon::now();
        $daysRemaining = round($today->diffInDays($dueDate, false));

        return redirect()->route('tasks.show', ['id' => $id])
            ->with('success', 'Tarefa atualizada com sucesso!')
            ->with('daysRemaining', $daysRemaining);
    }

    public function destroy($id)
    {
        $this->taskService->deleteTask($id);
        return redirect()->route('index');
    }

    public function screenCreateTask()
    {
        return view('create');
    }

    public function show($id)
    {
        $task = $this->taskService->findTaskById($id);

        try {
            $dueDate = Carbon::createFromFormat('Y-m-d', $task['due_date']);
        } catch (\Exception $e) {
            try {
                $dueDate = Carbon::createFromFormat('d/m/Y', $task['due_date']);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Formato de data inválido.');
            }
        }

        $today = Carbon::now();
        $daysRemaining = round($today->diffInDays($dueDate, false));

        return view('detail', compact('task', 'daysRemaining'));
    }
}
