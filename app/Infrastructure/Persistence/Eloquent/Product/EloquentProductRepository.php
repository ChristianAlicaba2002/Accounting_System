<?php

namespace App\Infrastructure\Persistence\Eloquent\Product;

use App\Domain\Product\Product;
use App\Domain\Product\ProductRepository;
use App\application\Product\RegisterProduct;

class EloquentProductRepository implements ProductRepository
{
    public function create(Product $product): Product
    {
        $productModel = ProductModel::where('productId', $product->getProductID())->first() ?? new ProductModel;
        $productModel->productId = $product->getProductID();
        $productModel->productName = $product->getProductName();
        $productModel->category = $product->getCategory();
        $productModel->price = $product->getPrice();
        $productModel->stock = $product->getStock();
        $productModel->image = $product->getImage();
        $productModel->adminId = $product->getAdminID();
        $productModel->adminUser = $product->getAdminUser();
        $productModel->save();

        return $product;
    }

    public function findByID($productId)
    {
        return ProductModel::where('productId', $productId)->first();
    }

    public function delete(string $productId): void
    {
        ProductModel::where('productId', $productId)->delete();
    }
}
