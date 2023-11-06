<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductAPI extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = new Product();
    }

    public function get()
    {
        try {
            $data = $this->data->with('orderDetail')->get();
            return $this->sendSuccessResponse($data);
        } catch (\Exception $e) {
            return $this->sendErrorResponse('Data gagal ditampilkan', 500, $e->getMessage());
        }
    }
}
