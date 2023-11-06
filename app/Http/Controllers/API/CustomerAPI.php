<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\{Customer};
use Illuminate\Http\Request;

class CustomerAPI extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = new Customer();
    }

    public function get()
    {
        try {
            $data = $this->data->with('orders', 'address')->get();
            return $this->sendSuccessResponse($data);
        } catch (\Exception $e) {
            return $this->sendErrorResponse('Data gagal ditampilkan', 500, $e->getMessage());
        }
    }
}
