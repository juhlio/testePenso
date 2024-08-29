@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Adicionar Nova Tarefa</h1>

    <form enctype="multipart/form-data" method="POST">
        @csrf

        <div class="form-group">
            <label for="subject">Assunto:</label>
            <input type="text" id="subject" name="subject" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="due_date">Data Limite:</label>
            <input type="date" id="due_date" name="due_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar Tarefa</button>
    </form>
</div>
@endsection
