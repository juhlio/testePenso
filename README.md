
# Gereciador de tarefas

Este projeto é uma aplicação web desenvolvida em Laravel para gerenciar tarefas. Ele permite a criação, leitura, atualização e exclusão de tarefas, com suporte a validação de dados e exibição de mensagens de sucesso ou erro.

## Requisitos

- PHP >= 8.0
- Laravel >= 10.x
- Composer






## Instalação

 git clone https://github.com/juhlio/testePenso

```bash
  cd testePenso
  composer install
  
  php artisan serve
 
```
 A aplicação estará disponível em http://localhost:8000.
    
## Estrutura
## Estrutura das Rotas

### Rotas da Web

As seguintes rotas estão definidas em `routes/web.php`:

- **`GET /`**: Exibe a lista de tarefas. Usa o método `index` do `TaskController`.
- **`GET /newtask`**: Exibe o formulário para criar uma nova tarefa. Usa o método `screenCreateTask` do `TaskController`.
- **`POST /newtask`**: Salva a nova tarefa. Usa o método `store` do `TaskController`.
- **`GET /tasks/{id}/edit`**: Exibe o formulário para editar uma tarefa existente. Usa o método `screenUpdateTask` do `TaskController`.
- **`PUT /tasks/{id}`**: Atualiza uma tarefa existente. Usa o método `update` do `TaskController`.
- **`DELETE /tasks/{id}`**: Exclui uma tarefa. Usa o método `destroy` do `TaskController`.
- **`GET /tasks/{id}`**: Exibe os detalhes de uma tarefa. Usa o método `detailTask` do `TaskController`.

### Rotas da API

As seguintes rotas estão definidas em `routes/api.php` para interações via API:

- **`GET /api/tasks`**: Lista todas as tarefas. Usa o método `index` do `TaskController`.
- **`POST /api/tasks`**: Cria uma nova tarefa. Usa o método `store` do `TaskController`.
- **`GET /api/tasks/{id}`**: Exibe os detalhes de uma tarefa. Usa o método `show` do `TaskController`.
- **`PUT /api/tasks/{id}`**: Atualiza uma tarefa. Usa o método `update` do `TaskController`.
- **`DELETE /api/tasks/{id}`**: Exclui uma tarefa. Usa o método `destroy` do `TaskController`.

## Controllers

### `TaskController`

Gerencia as operações CRUD (Create, Read, Update, Delete) para tarefas e exibe as páginas de visualização e edição. 

- **`index`**: Exibe a lista de todas as tarefas.
- **`screenCreateTask`**: Exibe o formulário para criar uma nova tarefa.
- **`store`**: Salva uma nova tarefa no banco de dados.
- **`screenUpdateTask`**: Exibe o formulário para editar uma tarefa existente.
- **`update`**: Atualiza os detalhes de uma tarefa existente.
- **`destroy`**: Exclui uma tarefa do banco de dados.
- **`detailTask`**: Exibe os detalhes de uma tarefa específica.

## Views

- **`resources/views/update.blade.php`**: Formulário para edição de tarefas. Permite

## Autores

- [@Julio](https://www.github.com/juhlio)

