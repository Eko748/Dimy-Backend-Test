<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;

class OrderDetailAPI extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = new OrderDetail();
    }

    public function get()
    {
        try {
            $data = $this->data->with('paymentMethods', 'products', 'order')->get();
            return $this->sendSuccessResponse($data);
        } catch (\Exception $e) {
            return $this->sendErrorResponse('Data gagal ditampilkan', 500, $e->getMessage());
        }
    }
}
