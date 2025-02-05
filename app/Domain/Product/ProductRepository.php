<?php

namespace App\Domain\Product;

interface ProductRepository
{
    public function create(Product $product);
    public function findByID(string $product_id);
    public function delete(string $productId);
}
