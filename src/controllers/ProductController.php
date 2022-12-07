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
        $product = $this->service->get($id);
        if (!$product)
        {
            http_response_code(404);
            echo json_encode([
                'msg' => 'Product not found'
            ]);
            return;
        }

        switch ($method)
        {
            case 'GET':
                echo json_encode($product);
                break;
            default:
                http_response_code(405);
                header('Allow: GET');
        }
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