<?php

declare(strict_types=1);

namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\Http\PhpEnvironment\Response as PhpResponse;

class ApiController extends AbstractActionController
{
    public function helloAction()
    {
        $name = $this->params()->fromRoute('name', 'guest');
        $data = [
            'status' => 'ok',
            'message' => sprintf('Hello, %s!', $name),
        ];

    $response = new PhpResponse();
    $response->getHeaders()->addHeaderLine('Content-Type', 'application/json');
    $response->setContent((string) json_encode($data));

    return $response;
    }

    public function createAction()
    {
        $data = json_decode((string) $this->getRequest()->getContent(), true) ?: [];

        $payload = [
            'status' => 'created',
            'data' => $data,
        ];

    $response = new PhpResponse();
    $response->getHeaders()->addHeaderLine('Content-Type', 'application/json');
    $response->setContent((string) json_encode($payload));

    return $response;
    }
}
