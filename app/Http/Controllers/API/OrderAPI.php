<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\{Order, OrderDetail};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderAPI extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = new Order();
    }

    public function get()
    {
        try {
            $data = $this->data->with('orderDetail', 'customer.address')->get();
            return $this->sendSuccessResponse($data);
        } catch (\Exception $e) {
            return $this->sendErrorResponse('Data gagal ditampilkan', 500, $e->getMessage());
        }
    }

    public function create(Request $request)
    {
        $orderDetails = $request->get('order_details');

        try {
            DB::beginTransaction();
            $order = Order::create([
                'customer_id' => $request->input('customer_id'),
            ]);

            if (is_array($orderDetails)) {
                foreach ($orderDetails as $detail) {
                    OrderDetail::create([
                        'order_id' => $order->id,
                        'product_id' => $detail['product_id'],
                        'payment_method_id' => $detail['payment_method_id']
                    ]);
                }
            } else {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $orderDetails['product_id'],
                    'payment_method_id' => $orderDetails['payment_method_id']
                ]);
            }

            DB::commit();

            return $this->sendSuccessResponse($order);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendErrorResponse('Membuat data gagal', 500, $e->getMessage());
        }
    }


    public function delete($id)
    {
        try {
            DB::beginTransaction();

            OrderDetail::where('order_id', $id)->delete();
            $order = $this->data->findOrFail($id);
            $order->delete();

            DB::commit();

            return $this->sendSuccessResponse($order);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendErrorResponse('Hapus data gagal', 500, $e->getMessage());
        }
    }
}
