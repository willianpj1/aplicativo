<?php

namespace app\trait;

use Slim\Views\Twig;

trait Template
{
    public function getTwig()
    {
        try {
            $twig = Twig::create(DIR_VIEW);
            #Adicionamos uma varaivel de template Global acessivel de qualquer template
            $twig->getEnvironment()->addGlobal('EMPRESA', 'Willian_Tech-2.0');
            return $twig;
        } catch (\Exception $e) {
            throw new \Exception("Restrição: " . $e->getMessage());
        }
    }
    public function SendJson($response, $data, $status = 200)
    {
        $payload = json_encode($data);
        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($status);
    }
    public function setView($name)
    {
        return $name . EXT_VIEW;
    }
    public function getHtml(string $templatename = '', array $data = []): string
    {

        $viewPath = DIR_VIEW . '/report/';
        $safeData = is_array($data) ? $data : [];
        $twig = Twig::create($viewPath,$safeData);
        #remove erros de string
        $html = $twig->fetch($templatename, $safeData);
        $html = $twig('/>\s+</', '/><', $html);
        return $html;

    }
}
