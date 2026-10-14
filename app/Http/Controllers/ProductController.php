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
                'price' => 23000,
                'category' => 'makanan',
                'recommended' => true,
                'image' => 'https://www.finnafood.com/blog/wp-content/uploads/2024/07/resep-mie-tarempa.jpg',
                'description' => 'Mie pipih khas Tarempa dengan kecap gurih, telur, tauge, daun bawang, dan bawang renyah.',
            ],
            [
                'id' => 2,
                'name' => 'Mie Tarempa Ayam',
                'price' => 23000,
                'category' => 'makanan',
                'recommended' => true,
                'image' => 'https://i0.wp.com/resepkoki.id/wp-content/uploads/2021/03/Resep-Mie-Tarempa.jpg?fit=996%2C1328&ssl=1',
                'description' => 'Mie Tarempa dengan daging ayam.',
            ],
            [
                'id' => 3,
                'name' => 'Mie Tarempa Sapi',
                'price' => 23000,
                'category' => 'makanan',
                'recommended' => false,
                'image' => 'https://assets-a1.kompasiana.com/items/album/2019/07/12/img-3773-jpg-5d276be4097f361dce2245b2.jpg',
                'description' => 'Mie Tarempa dengan daging sapi.',
            ],
            [
                'id' => 4,
                'name' => 'Mie Tarempa Seafood',
                'price' => 23000,
                'category' => 'makanan',
                'recommended' => true,
                'image' => 'https://allofresh.id/blog/wp-content/uploads/2023/05/resep-mie-tarempa-4.jpg',
                'description' => 'Mie Tarempa dengan bahan laut.',
            ],
        ];
    }

    public function index(Request $request)
    {
        $allProducts = collect($this->products());
        $search = trim($request->query('search', ''));
        $category = $request->query('category', 'all');

        $products = $allProducts->filter(function ($product) use (
            $search, $category
        ) {
            $matchSearch = $search === '' ||
                str_contains(
                    strtolower($product['name']),
                    strtolower($search)
                );

            $matchCategory = match ($category) {
                'recommended' => $product['recommended'],
                'makanan' => $product['category'] === 'makanan',
                'snack' => $product['category'] === 'snack',
                default => true,
            };

            return $matchSearch && $matchCategory;
        });

        return view('products.index', compact(
            'products', 'search', 'category'
        ))->with('selectedProduct', null)
          ->with('step', 'detail')
          ->with('quantity', 1);
    }

    public function show(Request $request, $id)
    {
        $selectedProduct = collect($this->products())
            ->firstWhere('id', (int) $id);

        abort_if(!$selectedProduct, 404);

        $products = collect($this->products());
        $search = '';
        $category = 'all';
        $step = $request->query('step', 'detail');
        $quantity = max(1, min(
            8, (int) $request->query('quantity', 1)
        ));

        return view('products.index', compact(
            'products', 'selectedProduct', 'search',
            'category', 'step', 'quantity'
        ));
    }

    public function checkout(Request $request, $id)
    {
        $product = collect($this->products())
            ->firstWhere('id', (int) $id);

        abort_if(!$product, 404);

        $quantity = max(1, min(
            8, (int) $request->query('quantity', 1)
        ));

        return view('products.checkout', compact(
            'product', 'quantity'
        ));
    }
}