@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Detalhes da Tarefa</h1>

    <!-- Exibição de mensagens de sucesso ou erro -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="form-group">
        <label for="subject">Assunto:</label>
        <p id="subject" class="form-control">{{ $task['subject'] }}</p>
    </div>

    <div class="form-group">
        <label for="description">Descrição:</label>
        <p id="description" class="form-control">{{ $task['description'] }}</p>
    </div>

    <div class="form-group">
        <label for="due_date">Data Limite:</label>
        <p id="due_date" class="form-control">{{ \Carbon\Carbon::parse($task['due_date'])->format('d/m/Y') }}</p>
    </div>

    <div class="form-group">
        <label for="days_remaining">Status:</label>
        <p id="days_remaining" class="form-control {{ $daysRemaining >= 0 ? 'bg-success text-white' : 'bg-danger text-white' }}">
            @if ($daysRemaining > 0)
                {{ $daysRemaining }} dias restantes
            @elseif ($daysRemaining === 0)
                A tarefa expira hoje.
            @else
                {{ abs($daysRemaining) }} dias de atraso
            @endif
        </p>
    </div>

    <div class="form-group">
        <!-- Botões de editar e excluir -->
        <a href="{{ route('tasks.edit', ['task' => $task['id']]) }}" class="btn btn-warning">Editar</a>

        <form action="{{ route('tasks.destroy', ['task' => $task['id']]) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
    </div>

    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
