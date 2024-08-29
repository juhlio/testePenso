Projeto de Gerenciamento de Tarefas
Este projeto é uma aplicação web desenvolvida em Laravel para gerenciar tarefas. Ele permite a criação, leitura, atualização e exclusão de tarefas, com suporte a validação de dados e exibição de mensagens de sucesso ou erro.

Requisitos
PHP >= 8.0
Laravel >= 10.x
Composer

Instalação
Clone o repositório:

bash
Copiar código
git clone https://github.com/juhlio/testePenso
cd seu-repositorio
Instale as dependências do Composer:

bash
Copiar código
composer install
Configure o arquivo .env:

Copie o arquivo .env.example para .env e ajuste as configurações conforme necessário.

bash
Copiar código
cp .env.example .env
Gere a chave de aplicação:

bash
Copiar código
php artisan serve
A aplicação estará disponível em http://localhost:8000.

Estrutura das Rotas
Rotas da Web
As seguintes rotas estão definidas em routes/web.php:

GET /: Exibe a lista de tarefas (TaskController@index).
GET /newtask: Exibe o formulário para criar uma nova tarefa (TaskController@screenCreateTask).
POST /newtask: Salva a nova tarefa (TaskController@store).
GET /tasks/{id}/edit: Exibe o formulário para editar uma tarefa (TaskController@screenUpdateTask).
PUT /tasks/{id}: Atualiza a tarefa (TaskController@update).
DELETE /tasks/{id}: Exclui a tarefa (TaskController@destroy).
GET /tasks/{id}: Exibe os detalhes de uma tarefa (TaskController@detailTask).
Rotas da API
As seguintes rotas estão definidas em routes/api.php para interações via API:

GET /api/tasks: Lista todas as tarefas (TaskController@index).
POST /api/tasks: Cria uma nova tarefa (TaskController@store).
GET /api/tasks/{id}: Exibe os detalhes de uma tarefa (TaskController@show).
PUT /api/tasks/{id}: Atualiza uma tarefa (TaskController@update).
DELETE /api/tasks/{id}: Exclui uma tarefa (TaskController@destroy).
Controllers
TaskController: Gerencia as operações CRUD para tarefas e exibe as páginas de visualização e edição.
Views
resources/views/update.blade.php: Formulário para edição de tarefas.
resources/views/detail.blade.php: Página para visualizar detalhes de uma tarefa.
resources/views/index.blade.php: Página principal que lista todas as tarefas.
Mensagens de Erro e Sucesso
As mensagens de sucesso e erro são exibidas nas views usando alertas Bootstrap. As mensagens são passadas usando a sessão Laravel:

Mensagens de erro de validação são exibidas na view de edição (update.blade.php) quando a validação falha.
Mensagens de sucesso são exibidas na view de detalhes (detail.blade.php) após a atualização bem-sucedida de uma tarefa.
