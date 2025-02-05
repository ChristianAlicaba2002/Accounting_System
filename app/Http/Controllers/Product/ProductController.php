<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\application\Product\RegisterProduct;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    protected RegisterProduct $registerProduct;
    public function __construct(registerProduct $registerProduct)
    {
        return $this->registerProduct = $registerProduct;
    }

    public function CreateProduct(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'productName' => 'required|string',
                'category' => 'required|string',
                'price' => 'required|numeric',
                'stock' => 'required|numeric',
                'image' => 'required|nullable',
                'adminId' => 'required|string',
                'adminUser' => 'required|string',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [];

        if ($request->file('image')) {
            $image = $request->file('image');
            $destinationPath = 'images';

            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
            $data['image'] = $imageName;
        } else {
            $data['image'] = 'default.jpg';
        }

        $price = floatval($request->price);
        $id = $this->GetGenerateProductID();

        $this->registerProduct->create(
            $id,
            $request->productName,
            $request->category,
            $price,
            $request->stock,
            $data['image'],
            $request->adminId,
            $request->adminUser
        );

        return redirect()->route('vendors');
    }


    public function GetGenerateProductID(): string
    {
        do {
            $id = $this->GenerateRandomProductID(6);
            // Check if the generated ID already exists
            $exists = $this->registerProduct->findByID($id);
        } while ($exists !== null); // Ensure the ID is unique

        return $id;
    }

    public function GenerateRandomProductID(int $length = 0): string
    {
        $result = substr(bin2hex(random_bytes(ceil($length / 2))), 0, $length);

        return $result;
    }

    public function DeleteProduct(string $productId)
    {
        $this->registerProduct->delete($productId);
        return redirect()->route('vendors');
    }
}
