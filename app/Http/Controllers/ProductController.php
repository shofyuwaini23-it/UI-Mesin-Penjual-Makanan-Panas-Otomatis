<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    private function products()
    {
        return [
            [
                'id' => 1,
                'name' => 'Mie Tarempa',
                'category' => 'Makanan',
                'price' => 23000,
                'image' => 'https://www.finnafood.com/blog/wp-content/uploads/2024/07/resep-mie-tarempa.jpg',
                'description' => 'Mie pipih khas Tarempa dengan racikan kecap gurih, telur, tauge, daun bawang, dan taburan bawang renyah.',

                'stock' => 8,
                'calories' => 420,
                'protein' => 16,
                'carbohydrates' => 55,
                'fat' => 12,
                'favorite' => true,
            ],

            [
                'id' => 2,
                'name' => 'Mie Tarempa Ayam',
                'category' => 'Makanan',
                'price' => 23000,
                'image' => 'https://i0.wp.com/resepkoki.id/wp-content/uploads/2021/03/Resep-Mie-Tarempa.jpg?fit=996%2C1328&ssl=1',
                'description' => 'Mie tarempa dengan tambahan daging ayam yang gurih dan lembut.',

                'stock' => 6,
                'calories' => 450,
                'protein' => 22,
                'carbohydrates' => 58,
                'fat' => 14,
                'favorite' => true,
            ],

            [
                'id' => 3,
                'name' => 'Mie Tarempa Sapi',
                'category' => 'Makanan',
                'price' => 23000,
                'image' => 'https://assets-a1.kompasiana.com/items/album/2019/07/12/img-3773-jpg-5d276be4097f361dce2245b2.jpg',
                'description' => 'Mie tarempa dengan potongan daging sapi yang gurih dan nikmat.',

                'stock' => 5,
                'calories' => 480,
                'protein' => 25,
                'carbohydrates' => 57,
                'fat' => 17,
                'favorite' => false,
            ],

            [
                'id' => 4,
                'name' => 'Mie Tarempa Seafood',
                'category' => 'Makanan',
                'price' => 23000,
                'image' => 'https://allofresh.id/blog/wp-content/uploads/2023/05/resep-mie-tarempa-4.jpg',
                'description' => 'Mie tarempa dengan berbagai bahan laut pilihan yang gurih dan lezat.',

                'stock' => 4,
                'calories' => 460,
                'protein' => 24,
                'carbohydrates' => 52,
                'fat' => 15,
                'favorite' => false,
            ],
        ];
    }

    public function index(Request $request)
    {

        $products = $this->products();

        $search = $request->search;
        $category = $request->category;

        if ($search) {

            $products = array_filter(
                $products,
                function ($product) use ($search) {

                    return stripos(
                        $product['name'],
                        $search
                    ) !== false;
                }
            );
        }

        if ($category && $category !== 'Semua') {

            $products = array_filter(
                $products,
                function ($product) use ($category) {

                    return $product['category'] === $category;
                }
            );
        }

        return view(
            'products.index',
            compact(
                'products',
                'search',
                'category'
            )
        );
    }

    public function show($id)
    {

        $products = $this->products();
  
        $product = collect($products)
            ->firstWhere('id', (int) $id);

        if (!$product) {

            abort(
                404,
                'Produk tidak ditemukan.'
            );
        }

        return view(
            'products.show',
            compact('product')
        );
    }
}