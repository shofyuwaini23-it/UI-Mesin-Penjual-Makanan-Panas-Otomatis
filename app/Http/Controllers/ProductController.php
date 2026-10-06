<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = [
            [
                'id' => 1,
                'name' => 'Mie Tarempa',
                'category' => 'Makanan',
                'price' => 23000,
                'image' => 'https://www.finnafood.com/blog/wp-content/uploads/2024/07/resep-mie-tarempa.jpg',
                'description' => 'Mie tarempa original.',
            ],
            [
                'id' => 2,
                'name' => 'Mie Tarempa Ayam',
                'category' => 'Makanan',
                'price' => 23000,
                'image' => 'https://i0.wp.com/resepkoki.id/wp-content/uploads/2021/03/Resep-Mie-Tarempa.jpg?fit=996%2C1328&ssl=1',
                'description' => 'Mie tarempa dengan daging ayam.',
            ],
            [
                'id' => 3,
                'name' => 'Mie Tarempa Sapi',
                'category' => 'Makanan',
                'price' => 23000,
                'image' => 'https://assets-a1.kompasiana.com/items/album/2019/07/12/img-3773-jpg-5d276be4097f361dce2245b2.jpg',
                'description' => 'Mie tarempa dengan daging sapi.',
            ],
            [
                'id' => 4,
                'name' => 'Mie Tarempa Seafood',
                'category' => 'Makanan',
                'price' => 23000,
                'image' => 'https://allofresh.id/blog/wp-content/uploads/2023/05/resep-mie-tarempa-4.jpg',
                'description' => 'Mie tarempa dengan bahan laut.',
            ],
        ];

        $search = $request->search;
        $category = $request->category;

        if ($search) {
            $products = array_filter($products, function ($product) use ($search) {
                return stripos($product['name'], $search) !== false;
            });
        }

        if ($category && $category !== 'Semua') {
            $products = array_filter($products, function ($product) use ($category) {
                return $product['category'] === $category;
            });
        }

        return view('products.index', compact(
            'products',
            'search',
            'category'
        ));
    }
}