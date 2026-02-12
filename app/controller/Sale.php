<?php

namespace app\controller;
use app\database\builder\DeleteQuery;
use app\database\builder\SelectQuery;
use app\database\builder\InsertQuery;
use app\database\builder\UpdateQuery;

class Sale extends Base
{
    public function cadastro($request, $response)
    {
        $dadosTemplate = [
            'titulo' => 'Página inicial'
        ];
        return $this->getTwig()
            ->render($response, $this->setView('sale'), $dadosTemplate)
            ->withHeader('Content-Type', 'text/html')
            ->withStatus(200);
    }
    public function lista($request, $response)
    {
        $dadosTemplate = [
            'titulo' => 'Página inicial'
        ];
        return $this->getTwig()
            ->render($response, $this->setView('listsale'), $dadosTemplate)
            ->withHeader('Content-Type', 'text/html')
            ->withStatus(200);
    }
    public function insert($request, $response)
    {
        $data = $request->getParsedBody();
        $id_produto = $data['pesquisa'];
        if (empty($id_produto) or  is_null($id_produto)) {
            return $this->SendJson($response, ['status' => false,'msg' => 'Produto não encontrado'], 400);
        }
        $customer = SelectQuery::select('id')
            ->from('product')
            ->order('id', 'desc')
            ->limit(1)
            ->fetch();
        if (!$customer) {
            return $this->SendJson($response, ['status' => false,'msg' => 'Restrição: Nenhum cliente encontrado!', 'id' => null], 400);
        }
        $id_customer = $customer['id'];
        $fieldAndvelues = [
            'id_cliente' => $id_customer,
            'total_bruto' => 0,
            'total_liquido' => 0,
            'desconto' => 0,
            'acrescimo' => 0,
            'observacao' => ''
        ];
        try {
            $IsInserted = InsertQuery::insert('sale')->fields($fieldAndvelues);
            if (!$IsInserted) {
            return $this->SendJson($response, ['status' => false,'msg' => 'Erro ao inserir venda','id' => null], 403);
            }
            $id_sale = $sale['id'];
            return $this->SendJson($response, ['status' => true, 'msg' => 'Venda cadastrada com sucesso!', 'id' => $id_sale], 201);
        } catch (\Exception $e) {
            return $this->SendJson($response, ['status' => false, 'msg' => 'Restrição: ' . $e->getMessage(), 'id' => 0], 500);
        }

        } catch (\Exception $e) {
            return $this->SendJson($response, ['status' => false,'msg' => 'Restrição: ' . $e->getMessage(),'id' => null], 500);
        }       
        
        }
        return $this->SendJson($response, [
            'status' => true,
            'msg' => 'Venda cadastrada com sucesso!',
            'id' => 0
        ], 200);
    }
}
