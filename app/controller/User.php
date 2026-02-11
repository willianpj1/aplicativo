<?php

namespace app\controller;

<<<<<<< Updated upstream
=======
use app\database\builder\DeleteQuery;
>>>>>>> Stashed changes
use app\database\builder\InsertQuery;
use app\database\builder\SelectQuery;
use app\database\builder\UpdateQuery;

<<<<<<< Updated upstream
class User extends Base
{
=======

class User extends Base
{

>>>>>>> Stashed changes
    public function lista($request, $response)
    {
        $dadosTemplate = [
            'titulo' => 'Lista de usuário'
        ];
        return $this->getTwig()
<<<<<<< Updated upstream
            ->render($response, $this->setView('listauser'), $dadosTemplate)
=======
            ->render($response, $this->setView('listuser'), $dadosTemplate)
>>>>>>> Stashed changes
            ->withHeader('Content-Type', 'text/html')
            ->withStatus(200);
    }
    public function cadastro($request, $response)
    {
        $dadosTemplate = [
            'acao' => 'c',
            'titulo' => 'Cadastro e alteracao de usuário'
        ];
        return $this->getTwig()
            ->render($response, $this->setView('user'), $dadosTemplate)
            ->withHeader('Content-Type', 'text/html')
            ->withStatus(200);
    }
    public function alterar($request, $response, $args)
    {
<<<<<<< Updated upstream
        $id = $args['id'];
        $user = SelectQuery::select()->from('vw_usuario_contatos')->where('id', '=', $id)->fetch();
=======
        $id = $args['id'] ?? null;
        
        // Validar se o ID é válido
        if (!$id || !is_numeric($id)) {
            $dadosTemplate = [
                'acao' => 'c',
                'id' => '',
                'titulo' => 'Cadastro e alteracao de usuário',
                'usuario' => null
            ];
            return $this->getTwig()
                ->render($response, $this->setView('user'), $dadosTemplate)
                ->withHeader('Content-Type', 'text/html')
                ->withStatus(200);
        }
        
        $usuario = SelectQuery::select()->from('users')->where('id', '=', $id)->fetch();
>>>>>>> Stashed changes
        $dadosTemplate = [
            'acao' => 'e',
            'id' => $id,
            'titulo' => 'Cadastro e alteracao de usuário',
<<<<<<< Updated upstream
            'usuario' => $user
=======
            'usuario' => $usuario
>>>>>>> Stashed changes
        ];
        return $this->getTwig()
            ->render($response, $this->setView('user'), $dadosTemplate)
            ->withHeader('Content-Type', 'text/html')
            ->withStatus(200);
    }
    public function listuser($request, $response)
    {
<<<<<<< Updated upstream

        #Captura todas a variaveis de forma mais segura VARIAVEIS POST.
        $form = $request->getParsedBody();
        #Qual a coluna da tabela deve ser ordenada.
        $order = $form['order'][0]['column'];
        #Tipo de ordenação
        $orderType = $form['order'][0]['dir'];
=======
        #Captura todas a variaveis de forma mais segura VARIAVEIS POST.
        $form = $request->getParsedBody();
        #Qual a coluna da tabela deve ser ordenada.
        $order = ($form['order'][0]['column'])
            ? $form['order'][0]['column']
            : 0;
        #Tipo de ordenação
        $orderType = $form['order'][0]['dir'] ?? 'desc';
>>>>>>> Stashed changes
        #Em qual registro se inicia o retorno dos registro, OFFSET
        $start = $form['start'];
        #Limite de registro a serem retornados do banco de dados LIMIT
        $length = $form['length'];
        $fields = [
            0 => 'id',
            1 => 'nome',
            2 => 'sobrenome',
            3 => 'cpf',
            4 => 'rg'
        ];
        #Capturamos o nome do capo a ser ordenado.
        $orderField = $fields[$order];
        #O termo pesquisado
        $term = $form['search']['value'];
<<<<<<< Updated upstream
        $query = SelectQuery::select('id,nome,sobrenome,cpf')->from('users');
        if (!is_null($term) && ($term !== '')) {
            $query->where('users.nome', 'ilike', "%{$term}%", 'or')
                ->where('users.sobrenome', 'ilike', "%{$term}%", 'or')
                ->where('users.cpf', 'ilike', "%{$term}%");
        }
=======
        $query = SelectQuery::select('id,nome,sobrenome,cpf,rg')->from('users');
        if (!is_null($term) && ($term !== '')) {
            $query->where('users.nome', 'ilike', "%{$term}%", 'or')
                ->where('users.sobrenome', 'ilike', "%{$term}%", 'or')
                ->where('users.cpf', 'ilike', "%{$term}%", 'or')
                ->where('users.rg', 'ilike', "%{$term}%");
        }

>>>>>>> Stashed changes
        $users = $query
            ->order($orderField, $orderType)
            ->limit($length, $start)
            ->fetchAll();
<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
        $userData = [];
        foreach ($users as $key => $value) {
            $userData[$key] = [
                $value['id'],
                $value['nome'],
                $value['sobrenome'],
                $value['cpf'],
                $value['rg'],
                "<a href='/usuario/alterar/{$value['id']}' class='btn btn-warning'>Editar</a>
<<<<<<< Updated upstream
                <button onclick='Delete({$value['id']})' class='btn btn-danger'>Excluir</button>"
=======
                 <button type='button'  onclick='Delete(" . $value['id'] . ");' class='btn btn-danger'>Excluir</button>"
>>>>>>> Stashed changes
            ];
        }
        $data = [
            'status' => true,
            'recordsTotal' => count($users),
            'recordsFiltered' => count($users),
            'data' => $userData
        ];
<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
        $payload = json_encode($data);

        $response->getBody()->write($payload);

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
    public function insert($request, $response)
    {
        try {
            $form = $request->getParsedBody();
            $FieldAndValues = [
                'nome' => $form['nome'],
                'sobrenome' => $form['sobrenome'],
                'cpf' => $form['cpf'],
                'rg' => $form['rg'],
<<<<<<< Updated upstream
                //'data_nascimento' => $form['data_nascimento'],
=======
>>>>>>> Stashed changes
                'senha' => password_hash($form['senha'], PASSWORD_DEFAULT),
                #'ativo' => (isset($form['ativo']) and $form['ativo'] === 'true') ? true : false,
                #'administrador' => (isset($form['administrador']) and $form['administrador'] === 'true') ? true : false
            ];
            $IsInsert = InsertQuery::table('users')->save($FieldAndValues);
            if (!$IsInsert) {
                $data = [
                    'status' => false,
<<<<<<< Updated upstream
                    'msg' => 'Restrição: ' . $$IsInsert,
=======
                    'msg' => 'Erro ao inserir usuário',
>>>>>>> Stashed changes
                    'id' => 0
                ];
                $payload = json_encode($data);
                $response->getBody()->write($payload);
                return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
            }
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
            $id = SelectQuery::select('id')->from('users')->order('id', 'desc')->fetch();

            $data = [
                'status' => true,
                'msg' => 'Cadastro realizado com sucesso! ',
                'id' => $id['id']
            ];
            $payload = json_encode($data);
            $response->getBody()->write($payload);
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        } catch (\Exception $e) {
<<<<<<< Updated upstream
=======
            $data = ['status' => false, 'msg' => 'Erro: ' . $e->getMessage(), 'id' => 0];
            return $this->SendJson($response, $data, 500);
        }
    }
    public function delete($request, $response)
    {
        try {
            $id = $_POST['id'];

            // Primeiro, deleta registros relacionados em contato
            try {
                DeleteQuery::table('contato')
                    ->where('id_users', '=', $id)
                    ->delete();
            } catch (\Exception $e) {
                // Log ou ignore se não houver registros
            }

            // Depois, deleta registros relacionados em endereco
            try {
                DeleteQuery::table('endereco')
                    ->where('id_users', '=', $id)
                    ->delete();
            } catch (\Exception $e) {
                // Log ou ignore se não houver registros
            }

            // Finalmente, deleta o usuário
            $IsDelete = DeleteQuery::table('users')
                ->where('id', '=', $id)
                ->delete();

            if (!$IsDelete) {
                $data = ['status' => false, 'msg' => 'Erro ao deletar usuário', 'id' => $id];
                return $this->SendJson($response, $data, 200);
            }

            $data = ['status' => true, 'msg' => 'Usuário removido com sucesso!', 'id' => $id];
            return $this->SendJson($response, $data, 200);
        } catch (\Throwable $th) {
            $data = ['status' => false, 'msg' => 'Erro: ' . $th->getMessage(), 'id' => $_POST['id'] ?? 0];
            return $this->SendJson($response, $data, 500);
>>>>>>> Stashed changes
        }
    }
    public function update($request, $response)
    {
        try {
            $form = $request->getParsedBody();
            $id = $form['id'];
            $FieldAndValues = [
                'nome' => $form['nome'],
                'sobrenome' => $form['sobrenome'],
                'cpf' => $form['cpf'],
                'rg' => $form['rg'],
<<<<<<< Updated upstream
                //'data_nascimento' => $form['data_nascimento'],
=======
>>>>>>> Stashed changes
                'senha' => password_hash($form['senha'], PASSWORD_DEFAULT),
                #'ativo' => (isset($form['ativo']) and $form['ativo'] === 'true') ? true : false,
                #'administrador' => (isset($form['administrador']) and $form['administrador'] === 'true') ? true : false
            ];
            $IsUpdate = UpdateQuery::table('users')->set($FieldAndValues)->where('id', '=', $id)->update();
            if (!$IsUpdate) {
                $data = [
                    'status' => false,
<<<<<<< Updated upstream
                    'msg' => 'Restrição: ' . $$IsUpdate,
=======
                    'msg' => 'Erro ao atualizar usuário',
>>>>>>> Stashed changes
                    'id' => 0
                ];
                $payload = json_encode($data);
                $response->getBody()->write($payload);
                return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(200);
            }
            $data = [
                'status' => true,
                'msg' => 'Dados alterados com sucesso! ',
                'id' => $id
            ];
            $payload = json_encode($data);
            $response->getBody()->write($payload);
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        } catch (\Exception $e) {
<<<<<<< Updated upstream
        }
    }
    public function print($request, $response)
=======
            $data = ['status' => false, 'msg' => 'Erro: ' . $e->getMessage(), 'id' => 0];
            return $this->SendJson($response, $data, 500);
        }
    }
        public function print($request, $response)
>>>>>>> Stashed changes
    {
        $html = $this->getHtml('reportuser.html');
        return $this->printer($html);
    }
}
<<<<<<< Updated upstream
=======


>>>>>>> Stashed changes
