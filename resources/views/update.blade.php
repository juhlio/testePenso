@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Alterar Tarefa</h1>

    <!-- Exibição de mensagens de erro -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Mensagem de erro se a tarefa estiver atrasada -->
    @if(isset($isExpired) && $isExpired)
        <div class="alert alert-danger">
            Não é possível alterar uma tarefa atrasada.
        </div>
    @endif

    <form action="{{ route('tasks.update', $task['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="subject">Assunto:</label>
            <input type="text" id="subject" name="subject" value="{{ $task['subject'] }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea id="description" name="description" class="form-control" rows="4" required>{{ $task['description'] }}</textarea>
        </div>

        <div class="form-group">
            <label for="due_date">Data Limite:</label>
            <input type="date" id="due_date" name="due_date" value="{{ \Carbon\Carbon::parse($task['due_date'])->format('Y-m-d') }}" class="form-control" required>
        </div>

        <input type="hidden" name="id" value="{{ $task['id'] }}">

        <!-- Botão de salvar que será desativado se a tarefa estiver expirada -->
        <button type="submit" class="btn btn-primary" {{ isset($isExpired) && $isExpired ? 'disabled' : '' }}>
            Salvar Alterações
        </button>
    </form>
</div>
@endsection
