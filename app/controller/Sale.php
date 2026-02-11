<?php

namespace app\controller;

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
        $id_produto = $data['id_produto'];

        $fieldandvalues = [
            'id_produto' => $id_produto,
            'quantidade' => $data['quantidade'],
            'valor_unitario' => $data['valor_unitario'],
            'valor_total' => $data['valor_total']
        ];
        
        
    }
}
