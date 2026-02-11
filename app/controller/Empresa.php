<?php

namespace app\controller;

<<<<<<< Updated upstream
use app\database\builder\SelectQuery;
use app\database\builder\InsertQuery;
use app\database\builder\DeleteQuery;
=======
use app\database\builder\DeleteQuery;
use app\database\builder\SelectQuery;
use app\database\builder\InsertQuery;
use app\database\builder\UpdateQuery;
>>>>>>> Stashed changes

class Empresa extends Base
{

    public function lista($request, $response)
    {
        $dadosTemplate = [
<<<<<<< Updated upstream
            'titulo' => 'Lista de empresa'
        ];
        return $this->getTwig()
            ->render($response, $this->setView('listaempresa'), $dadosTemplate)
            ->withHeader('Content-Type', 'text/html')
            ->withStatus(200);
    }
    public function insert($request, $response)
    {
        try {
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $cpf = $_POST['cpf'];
            $rg = $_POST['rg'];
            $FieldsAndValues = [
                'nome_fantasia' => $nome,
                'sobrenome_razao' => $sobrenome,
                'cpf_cnpj' => $cpf,
                'rg_ie' => $rg
            ];
            if (is_null($nome) || $nome === '') {
                echo json_encode(['status' => false, 'msg' => 'Por favor informe o nome!', 'id' => 0]);
                die;
            }
            if (is_null($sobrenome) ||  $sobrenome === '') {
                echo json_encode(['status' => false, 'msg' => 'Por favor informe o sobrenome!', 'id' => 0]);
                die;
            }
            if (is_null($cpf) || $cpf === '') {
                echo json_encode(['status' => false, 'msg' => 'Por favor informe o cpf!', 'id' => 0]);
                die;
            }
            if (is_null($rg) || $rg === '') {
                echo json_encode(['status' => false, 'msg' => 'Por favor informe o rg!', 'id' => 0]);
                die;
            }
            $IsSave = InsertQuery::table('empresa')->save($FieldsAndValues);

            if (!$IsSave) {
                echo json_encode(['status' => false, 'msg' => $IsSave, 'id' => 0]);
                die;
            }
            echo json_encode(['status' => true, 'msg' => 'Salvo com sucesso!', 'id' => 0]);
            die;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function cadastro($request, $response)
    {
        $dadosTemplate = [
            'titulo' => 'Cadastro de empresa'
=======
            'titulo' => 'Lista da empresa'
        ];
        return $this->getTwig()
            ->render($response, $this->setView('listempresa'), $dadosTemplate)
            ->withHeader('Content-Type', 'text/html')
            ->withStatus(200);
    }
    public function cadastro($request, $response)
    {
        $dadosTemplate = [
            'titulo' => 'Cadastro de empresa',
            'acao' => 'c',
            'id' => '',
            'empresa' => []
>>>>>>> Stashed changes
        ];
        return $this->getTwig()
            ->render($response, $this->setView('empresa'), $dadosTemplate)
            ->withHeader('Content-Type', 'text/html')
            ->withStatus(200);
    }
<<<<<<< Updated upstream
    public function listaempresa($request, $response)
    {
        #Captura todas a variaveis de forma mais segura VARIAVEIS POST.
        $form = $request->getParsedBody();
        #Qual a coluna da tabela deve ser ordenada.
        $order = $form['order'][0]['column'];
        #Tipo de ordenação
        $orderType = $form['order'][0]['dir'];
        #Em qual registro se inicia o retorno dos registro, OFFSET
        $start = $form['start'];
        #Limite de registro a serem retornados do banco de dados LIMIT
        $length = $form['length'];
        $fields = [
            0 => 'id',
            1 => 'nome_fantasia',
            2 => 'sobrenome_razao',
            3 => 'cpf_cnpj',
            4 => 'rg_ie'
        ];
        #Capturamos o nome do capo a ser ordenado.
        $orderField = $fields[$order];
        #O termo pesquisado
        $term = $form['search']['value'];
        $query = SelectQuery::select('id,nome_fantasia,sobrenome_razao,cpf_cnpj,rg_ie')->from('empresa');
        if (!is_null($term) && ($term !== '')) {
            $query->where('empresa.nome_fantasia', 'ilike', "%{$term}%", 'or')
                ->where('empresa.sobrenome_razao', 'ilike', "%{$term}%", 'or')
                ->where('empresa.cpf_cnpj', 'ilike', "%{$term}%", 'or')
                ->where('empresa.rg_ie', 'ilike', "%{$term}%");
        }

        if (!is_null($order) && ($order !== '')) {
            $query->order($orderField, $orderType);
        }
        $empresas = $query->limit($length, $start)
        ->fetchAll();
        $empresaData = [];
        foreach ($empresas as $key => $value) {
            $empresaData[$key] = [
                $value['id'],
                $value['nome_fantasia'],
                $value['sobrenome_razao'],
                $value['cpf_cnpj'],
                $value['rg_ie'],
                "<button class='btn btn-warning'>Editar</button>
                <button type='button'  onclick='Delete(" . $value['id'] . ");' class='btn btn-danger'>Excluir</button>"
            ];
        }
        $data = [
            'status' => true,
            'recordsTotal' => count($empresas),
            'recordsFiltered' => count($empresas),
            'data' => $empresaData
        ];
        return $this->SendJson($response, $data);
=======
    public function listempresa($request, $response)
    {
        try {
            #Captura todas a variaveis de forma mais segura VARIAVEIS POST.
            $form = $request->getParsedBody();
            
            #Qual a coluna da tabela deve ser ordenada.
            $order = $form['order'][0]['column'] ?? 0;
            #Tipo de ordenação
            $orderType = $form['order'][0]['dir'] ?? 'asc';
            #Em qual registro se inicia o retorno dos registro, OFFSET
            $start = $form['start'] ?? 0;
            #Limite de registro a serem retornados do banco de dados LIMIT
            $length = $form['length'] ?? 10;
            
            $fields = [
                0 => 'id',
                1 => 'nome_fantasia',
                2 => 'sobrenome_razao',
                3 => 'cpf_cnpj',
                4 => 'rg_ie',
                5 => 'data_nascimento_abertura'
            ];
            
            #Capturamos o nome do campo a ser ordenado.
            $orderField = $fields[$order] ?? 'id';
            #O termo pesquisado
            $term = $form['search']['value'] ?? '';
            
            $query = SelectQuery::select('id,nome_fantasia,sobrenome_razao,cpf_cnpj,rg_ie,data_nascimento_abertura')->from('company');
            
            $queryTotal = SelectQuery::select('COUNT(*) as total')->from('company');
            $totalRecords = $queryTotal->fetch()['total'] ?? 0;
            
            if (!is_null($term) && ($term !== '')) {
                $query->where('company.nome_fantasia', 'ilike', "%{$term}%", 'or')
                    ->where('company.sobrenome_razao', 'ilike', "%{$term}%", 'or')
                    ->where('company.cpf_cnpj', 'ilike', "%{$term}%", 'or')
                    ->where('company.rg_ie', 'ilike', "%{$term}%")
                    ->where('company.data_nascimento_abertura', 'ilike', "%{$term}%");

                $queryFiltered = SelectQuery::select('COUNT(*) as total')->from('company')
                    ->where('company.nome_fantasia', 'ilike', "%{$term}%", 'or')
                    ->where('company.sobrenome_razao', 'ilike', "%{$term}%", 'or')
                    ->where('company.cpf_cnpj', 'ilike', "%{$term}%", 'or')
                    ->where('company.rg_ie', 'ilike', "%{$term}%")
                    ->where('company.data_nascimento_abertura', 'ilike', "%{$term}%");
                $totalFiltered = $queryFiltered->fetch()['total'] ?? 0;
            } else {
                $totalFiltered = $totalRecords;
            }

            $users = $query
                ->order($orderField, $orderType)
                ->limit($length, $start)
                ->fetchAll();
            
            $userData = [];
            foreach ($users as $key => $value) {
                $userData[$key] = [
                    $value['id'],
                    $value['nome_fantasia'],
                    $value['sobrenome_razao'],
                    $value['cpf_cnpj'],
                    $value['rg_ie'],
                    $value['data_nascimento_abertura'],
                    "<a href='/empresa/alterar/{$value['id']}' class='btn btn-warning'>Editar</a>
                    <button type='button'  onclick='Delete(" . $value['id'] . ");' class='btn btn-danger'>Excluir</button>"
                ];
            }
            
            $data = [
                'draw' => $form['draw'] ?? 1,
                'recordsTotal' => $totalRecords,
                'recordsFiltered' => $totalFiltered,
                'data' => $userData
            ];
            
            $payload = json_encode($data);
            $response->getBody()->write($payload);

            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        } catch (\Throwable $th) {
            $data = [
                'draw' => $form['draw'] ?? 1,
                'recordsTotal' => 0,
                'recordsFiltered' => 0,
                'data' => [],
                'error' => $th->getMessage()
            ];
            $response->getBody()->write(json_encode($data));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
    }
      public function alterar($request, $response, $args)
    {
        $id = $args['id'] ?? null;
        
        // Validar se o ID é válido
        if (!$id || !is_numeric($id)) {
            $dadosTemplate = [
                'acao' => 'c',
                'id' => '',
                'titulo' => 'Cadastro e alteracao de empresa',
                'empresa' => null
            ];
            return $this->getTwig()
                ->render($response, $this->setView('empresa'), $dadosTemplate)
                ->withHeader('Content-Type', 'text/html')
                ->withStatus(200);
        }
        
        $empresa = SelectQuery::select()->from('company')->where('id', '=', $id)->fetch();
        $dadosTemplate = [
            'acao' => 'e',
            'id' => $id,
            'titulo' => 'Cadastro e alteracao de empresa',
            'empresa' => $empresa
        ];
        return $this->getTwig()
            ->render($response, $this->setView('empresa'), $dadosTemplate)
            ->withHeader('Content-Type', 'text/html')
            ->withStatus(200);
>>>>>>> Stashed changes
    }
    public function delete($request, $response)
    {
        try {
            $id = $_POST['id'];
<<<<<<< Updated upstream
            $IsDelete = DeleteQuery::table('empresa')
=======
            
            // Primeiro, deleta registros relacionados em contato
            try {
                DeleteQuery::table('contato')
                    ->where('id_company', '=', $id)
                    ->delete();
            } catch (\Exception $e) {
                // Log ou ignore se não houver registros
            }

            // Depois, deleta registros relacionados em endereco
            try {
                DeleteQuery::table('endereco')
                    ->where('id_company', '=', $id)
                    ->delete();
            } catch (\Exception $e) {
                // Log ou ignore se não houver registros
            }

            // Finalmente, deleta o usuário
            $IsDelete = DeleteQuery::table('company')
>>>>>>> Stashed changes
                ->where('id', '=', $id)
                ->delete();

            if (!$IsDelete) {
<<<<<<< Updated upstream
                echo json_encode(['status' => false, 'msg' => $IsDelete, 'id' => $id]);
                die;
            }
            echo json_encode(['status' => true, 'msg' => 'Removido com sucesso!', 'id' => $id]);
            die;
        } catch (\Throwable $th) {
            echo "Erro: " . $th->getMessage();
            die;
=======
                $data = ['status' => false, 'msg' => 'Erro ao deletar empresa', 'id' => $id];
                return $this->SendJson($response, $data, 200);
            }
            
            $data = ['status' => true, 'msg' => 'empresa removido com sucesso!', 'id' => $id];
            return $this->SendJson($response, $data, 200);
            
        } catch (\Throwable $th) {
            $data = ['status' => false, 'msg' => 'Erro: ' . $th->getMessage(), 'id' => $_POST['id'] ?? 0];
            return $this->SendJson($response, $data, 500);
        }
    }
    public function update($request, $response)
    {
        try {
            $form = $request->getParsedBody();
            $id = $form['id'];
            $FieldAndValues = [
                'nome_fantasia' => $form['nome_fantasia'],
                'sobrenome_razao' => $form['sobrenome_razao'],
                'cpf_cnpj' => $form['cpf_cnpj'],
                'rg_ie' => $form['rg_ie'],
                'data_nascimento_abertura' => $form['data_nascimento_abertura']
            ];
            $IsUpdate = UpdateQuery::table('company')->set($FieldAndValues)->where('id', '=', $id)->update();
            if (!$IsUpdate) {
                $data = [
                    'status' => false,
                    'msg' => 'Erro ao atualizar empresa',
                    'id' => 0
                ];
                return $this->SendJson($response, $data, 200);
            }
            $data = [
                'status' => true,
                'msg' => 'Dados alterados com sucesso!',
                'id' => $id
            ];
            return $this->SendJson($response, $data, 200);
        } catch (\Exception $e) {
            $data = ['status' => false, 'msg' => 'Exceção: ' . $e->getMessage(), 'id' => 0];
            return $this->SendJson($response, $data, 500);
        }
    }
    public function insert($request, $response)
    {
        try {
            $form = $request->getParsedBody();
            $FieldsAndValues = [
                'nome_fantasia' => $form['nome_fantasia'] ?? null,
                'sobrenome_razao' => $form['sobrenome_razao'] ?? null,
                'cpf_cnpj' => $form['cpf_cnpj'] ?? null,
                'rg_ie' => $form['rg_ie'] ?? null,
                'data_nascimento_abertura' => $form['data_nascimento_abertura'] ?? null
            ];
            $IsSave = InsertQuery::table('company')->save($FieldsAndValues);

            if (!$IsSave) {
                $data = ['status' => false, 'msg' => 'Erro ao inserir empresa', 'id' => 0];
                return $this->SendJson($response, $data, 200);
            }
            
            $id = SelectQuery::select('id')->from('company')->order('id', 'desc')->fetch();
            $data = [
                'status' => true,
                'msg' => 'empresa cadastrada com sucesso!',
                'id' => $id['id'] ?? 0
            ];
            return $this->SendJson($response, $data, 200);
        } catch (\Throwable $th) {
            $data = ['status' => false, 'msg' => 'Exceção: ' . $th->getMessage(), 'id' => 0];
            return $this->SendJson($response, $data, 500);
>>>>>>> Stashed changes
        }
    }
}
