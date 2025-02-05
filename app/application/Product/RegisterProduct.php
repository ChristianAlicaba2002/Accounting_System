<?php

namespace App\application\Product;

use App\Domain\Product\Product;
use App\Domain\Product\ProductRepository;


class RegisterProduct
{
    protected ProductRepository $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function create(string $productId, string $productName, string $category, int $price, int $stock, string $image, string $adminId, string $adminUser): Product
    {
        $receivedProduct = new Product($productId, $productName, $category, $price, $stock, $image, $adminId, $adminUser);
        return $this->productRepository->create($receivedProduct);
    }

    public function findByID(string $productId): ?Product
    {
        return $this->productRepository->findByID($productId);
    }

    public function delete(string $productId): void
    {
        $this->productRepository->delete($productId);
    }
}
