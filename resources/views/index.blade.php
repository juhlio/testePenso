@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Lista de Tarefas</h1>

    <!-- Botão para adicionar uma nova tarefa -->
    <a href="{{ route('createTask') }}" class="btn btn-success mb-3">Adicionar Tarefa</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Assunto</th>
                <th>Descrição</th>
                <th>Data Limite</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $task)
                <tr>
                    <td>{{ $task['subject'] }}</td>
                    <td>{{ $task['description'] }}</td>
                    <td>{{ \Carbon\Carbon::parse($task['due_date'])->format('d/m/Y') }}</td>
                    <td>
                        <!-- Botão para editar -->
                        <a href="{{ route('tasks.edit', ['task' => $task['id']]) }}" class="btn btn-warning btn-sm">Editar</a>

                        <!-- Botão para excluir -->
                        <form action="{{ route('tasks.destroy', ['task' => $task['id']]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Nenhuma tarefa encontrada</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
