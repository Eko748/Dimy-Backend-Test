<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\{PaymentMethod};
use Illuminate\Http\Request;

class PaymentMethodAPI extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = new PaymentMethod();
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
