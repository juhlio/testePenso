@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Criar Nova Tarefa</h1>

    <!-- Exibição de mensagens de erro -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="subject">Assunto:</label>
            <input type="text" id="subject" name="subject" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea id="description" name="description" class="form-control" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="due_date">Data Limite:</label>
            <input type="date" id="due_date" name="due_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar Tarefa</button>
    </form>
</div>
@endsection
