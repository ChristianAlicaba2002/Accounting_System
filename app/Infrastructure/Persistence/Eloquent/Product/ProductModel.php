<?php

namespace App\Infrastructure\Persistence\Eloquent\Product;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $fillable = ['productId', 'productName', 'category', 'price', 'stock', 'image', 'adminId', 'adminUser'];
}
