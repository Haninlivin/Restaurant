<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $dishes = Dish::orderBy('id', 'desc')->get();
        return view('order_form', compact('dishes'));
    }

    public function submit(Request $request)
    {
        $data = array_filter($request->except('_token'));
        $orderId = rand();
        $request->table = 1;
        foreach ($data as $key => $value) {
            if ($value > 1) {
                for ($i = 0; $i < $value; $i++) {
                    $this->orderCreate($key, $request, $orderId);
                }
            } else {
                $this->orderCreate($key, $request, $orderId);
            }
            exit();
        }
    }

    public function orderCreate($orderId, $dish_id, $request)
    {
        $dish = new Dish();
        $dish->order_id = $orderId;
        $dish->dish_id = $dish_id;
        $dish->table_id = $request->table;
        $dish->status = config('orderrequest.order_status.new');

        $dish->save();
    }
}
