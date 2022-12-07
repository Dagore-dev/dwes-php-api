<?php

class StoreController extends Controller
{

    public function __construct(StoreService|Service $service)
    {
        $this->service = $service;
    }

    public function processRequest(string $method, ?string $id): void
    {
        if ($id)
        {
            $this->processResourceRequest($method, $id);
        }
        else
        {
            $this->processCollectionRequest($method);
        }
    }

    protected function processResourceRequest(string $method, string $id): void
    {
        // TODO: Implement processResourceRequest() method.
    }

    protected function processCollectionRequest(string $method): void
    {
        switch ($method)
        {
            case 'GET':
                $data = $this->service->getAll();
                echo json_encode($data);
                break;
            default:
                http_response_code(405);
                header('Allow: GET');
        }
    }

    protected function getValidationErrors(array $data, bool $is_new = true): array
    {
        // TODO: Implement getValidationErrors() method.
        return [];
    }
}