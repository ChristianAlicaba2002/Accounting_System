<?php

namespace App\Domain\Product;

class Product
{
    public function __construct(
        private string $productId,
        private string $productName,
        private string $category,
        private int $price,
        private int $stock,
        private string $image,
        private string $adminId,
        private string $adminUser
    ) {
        $this->productId = $productId;
        $this->productName = $productName;
        $this->category = $category;
        $this->price = $price;
        $this->stock = $stock;
        $this->image = $image;
        $this->adminId = $adminId;
        $this->adminUser = $adminUser;
    }

    public function getProductID()
    {
        return $this->productId;
    }
    public function getProductName()
    {
        return $this->productName;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getAdminID()
    {
        return $this->adminId;
    }

    public function getAdminUser()
    {
        return $this->adminUser;
    }
}
