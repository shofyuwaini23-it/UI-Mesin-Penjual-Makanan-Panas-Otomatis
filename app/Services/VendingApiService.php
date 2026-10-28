<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use RuntimeException;

class VendingApiService
{
    private function client()
    {
        $baseUrl = config('services.vending.base_url');

        if (empty($baseUrl)) {
            throw new RuntimeException(
                'API bwwackend belum dikonfigurasi. Isi API_BASE_URL di file .env.'
            );
        }

        return Http::acceptJson()
            ->baseUrl(rtrim($baseUrl, '/'))
            ->timeout(config('services.vending.timeout', 5));
    }

    public function getProducts()
    {
        return $this->client()->get('/api/v1/products');
    }

    public function getInventory()
    {
        return $this->client()->get('/api/inventories');
    }
}
