<?php

namespace App\Infrastructure\Http;

use App\Application\Service\ProductManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ProductController
{
    private ProductManager $productManager;

    public function __construct(ProductManager $productManager)
    {
        $this->productManager = $productManager;
    }

    public function create(Request $request): JsonResponse
    {
        $product = $this->productManager->createProduct('Name', 'sku', 100);

        return new JsonResponse(
            [
                'product' => [
                    'id' => $product->id(),
                    'name' => $product->name(),
                ],
            ]
        );
    }

    public function get(Request $request): JsonResponse
    {
        $product = $this->productManager->getProduct($request->get('id'));
        if (!$product) {
            return new JsonResponse([], JsonResponse::HTTP_NOT_FOUND);
        }

        return new JsonResponse(
            [
                'product' => [
                    'id' => $product->id(),
                    'name' => $product->name(),
                ],
            ]
        );
    }
}
