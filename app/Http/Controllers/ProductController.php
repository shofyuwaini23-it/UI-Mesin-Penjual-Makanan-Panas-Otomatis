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
                'nutrition' => [
                    'kalori' => 450,
                    'karbohidrat' => 65,
                    'lemak' => 14,
                    'protein' => 18,
                ],
            ],
            [
                'id' => 2,
                'name' => 'Mie Tarempa Ayam',
                'price' => 23000,
                'category' => 'makanan',
                'recommended' => true,
                'image' => 'https://i0.wp.com/resepkoki.id/wp-content/uploads/2021/03/Resep-Mie-Tarempa.jpg?fit=996%2C1328&ssl=1',
                'description' => 'Mie Tarempa dengan daging ayam.',
                'nutrition' => [
                    'kalori' => 480,
                    'karbohidrat' => 65,
                    'lemak' => 15,
                    'protein' => 23,
                ],
            ],
            [
                'id' => 3,
                'name' => 'Mie Tarempa Sapi',
                'price' => 23000,
                'category' => 'makanan',
                'recommended' => false,
                'image' => 'https://assets-a1.kompasiana.com/items/album/2019/07/12/img-3773-jpg-5d276be4097f361dce2245b2.jpg',
                'description' => 'Mie Tarempa dengan daging sapi.',
                'nutrition' => [
                    'kalori' => 520,
                    'karbohidrat' => 65,
                    'lemak' => 19,
                    'protein' => 26,
                ],
            ],
            [
                'id' => 4,
                'name' => 'Mie Tarempa Seafood',
                'price' => 23000,
                'category' => 'makanan',
                'recommended' => true,
                'image' => 'https://allofresh.id/blog/wp-content/uploads/2023/05/resep-mie-tarempa-4.jpg',
                'description' => 'Mie Tarempa dengan bahan laut.',
                'nutrition' => [
                    'kalori' => 490,
                    'karbohidrat' => 65,
                    'lemak' => 16,
                    'protein' => 25,
                ],
            ],
        ];
    }

    private function filterProducts($products, $search, $category)
    {
        return $products->filter(function ($product) use (
            $search,
            $category
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
        })->values();
    }

    public function index(Request $request)
    {
        $allProducts = collect($this->products());

        $search = trim($request->query('search', ''));
        $category = $request->query('category', 'all');

        $products = $this->filterProducts(
            $allProducts,
            $search,
            $category
        );

        return view('products.index', compact(
            'products',
            'search',
            'category'
        ));
    }

    public function show(Request $request, $id)
    {
        $allProducts = collect($this->products());

        $product = $allProducts->firstWhere(
            'id',
            (int) $id
        );

        abort_if(!$product, 404);

        $search = trim($request->query('search', ''));
        $category = $request->query('category', 'all');

        $products = $this->filterProducts(
            $allProducts,
            $search,
            $category
        );

        return view('products.show', compact(
            'product',
            'products',
            'search',
            'category'
        ));
    }

    public function checkout(Request $request, $id)
    {
        $allProducts = collect($this->products());

        $product = $allProducts->firstWhere(
            'id',
            (int) $id
        );

        abort_if(!$product, 404);

        $quantity = max(
            1,
            min(8, (int) $request->query('quantity', 1))
        );

        $search = trim($request->query('search', ''));
        $category = $request->query('category', 'all');

        $products = $this->filterProducts(
            $allProducts,
            $search,
            $category
        );

        $total = $product['price'] * $quantity;

        return view('products.check', compact(
            'product',
            'products',
            'quantity',
            'total',
            'search',
            'category'
        ));
    }

    public function processing(Request $request, $id)
    {
        $product = collect($this->products())->firstWhere(
            'id',
            (int) $id
        );

        abort_if(!$product, 404);

        $quantity = max(
            1,
            min(8, (int) $request->query('quantity', 1))
        );

        $method = strtolower(
            $request->query('method', 'qris')
        );

        abort_unless(
            in_array($method, ['qris', 'va'], true),
            404
        );

        $total = $product['price'] * $quantity;

        $orderNumber = 'A-024';

        return view('payment.processing', compact(
            'product',
            'quantity',
            'method',
            'total',
            'orderNumber'
        ));
    }

    public function status(Request $request, $id)
    {
        $product = collect($this->products())->firstWhere(
            'id',
            (int) $id
        );

        abort_if(!$product, 404);

        $quantity = max(
            1,
            min(8, (int) $request->query('quantity', 1))
        );

        $total = $product['price'] * $quantity;

        $orderNumber = 'A-024';

        return view('products.status', compact(
            'product',
            'quantity',
            'total',
            'orderNumber'
        ));
    }

    public function finished(Request $request, $id)
    {
        $product = collect($this->products())->firstWhere(
            'id',
            (int) $id
        );

        abort_if(!$product, 404);

        $quantity = max(
            1,
            min(8, (int) $request->query('quantity', 1))
        );

        $total = $product['price'] * $quantity;

        $orderNumber = 'A-024';

        return view('products.finished', compact(
            'product',
            'quantity',
            'total',
            'orderNumber'
        ));
    }
}