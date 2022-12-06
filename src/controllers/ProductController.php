<?php

class ProductController extends Controller
{

    public function __construct(ProductService|Service $productService)
    {
        $this->service = $productService;
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
        $data = $this->service->getAll();
        echo json_encode($data);
    }

    protected function getValidationErrors(array $data, bool $is_new = true): array
    {
        // TODO: Implement getValidationErrors() method.
        return [];
    }
}