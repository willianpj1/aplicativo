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
<<<<<<< Updated upstream
            $twig->getEnvironment()->addGlobal('EMPRESA', 'Willian_Tech-2.0');
=======
            $twig->getEnvironment()->addGlobal('EMPRESA', 'Gambiarra&CIA');
>>>>>>> Stashed changes
            return $twig;
        } catch (\Exception $e) {
            throw new \Exception("Restrição: " . $e->getMessage());
        }
    }
<<<<<<< Updated upstream
    public function SendJson($response, $data, $status = 200)
    {
        $payload = json_encode($data);
        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($status);
    }
=======
>>>>>>> Stashed changes
    public function setView($name)
    {
        return $name . EXT_VIEW;
    }
<<<<<<< Updated upstream
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
=======
    public function SendJson($response, array $data = [], int $statusCode = 200)
    {
        #Converte o arrya do PHP para formato JSON
        $payload = json_encode($data);
        #Retorna uma resposta em formato JSON
        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($statusCode);
    }
    public function getHtml(
        string $templateName = '',
        array $data = []
    ): string {
        $viewsPath = DIR_VIEW . '/reports/';
        $safeData = is_array($data) ? $data : [];
        $twig = Twig::create($viewsPath, $safeData);
        #Remove erros de string
        $html = $twig->fetch($templateName, $safeData);
        #$html = $twig('/>\s+</', '><', $html);
        return $html;
    }
}
>>>>>>> Stashed changes
