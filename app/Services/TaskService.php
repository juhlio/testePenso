<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class TaskService
{
    protected $filePath;

    public function __construct()
    {
        $this->filePath = storage_path('app/tasks.json');
    }

    public function getAllTasks()
    {
        $content = Storage::get('tasks.json');
        return json_decode($content, true);
    }

    public function saveTasks($tasks)
    {
        $json = json_encode($tasks, JSON_PRETTY_PRINT);
        Storage::put('tasks.json', $json);
    }

    public function findTaskById($id)
    {
        $tasks = $this->getAllTasks();
        return collect($tasks)->firstWhere('id', $id);
    }

    public function addTask($task)
    {
        $tasks = $this->getAllTasks();
        $tasks[] = $task;
        $this->saveTasks($tasks);
    }

    public function updateTask($id, $updatedTask)
    {
        $tasks = $this->getAllTasks();
        $tasks = array_map(function ($task) use ($id, $updatedTask) {
            return $task['id'] === $id ? $updatedTask : $task;
        }, $tasks);
        $this->saveTasks($tasks);
    }

    public function deleteTask($id)
    {
        $tasks = $this->getAllTasks();
        $tasks = array_filter($tasks, fn($task) => $task['id'] !== $id);
        $this->saveTasks($tasks);
    }
}
