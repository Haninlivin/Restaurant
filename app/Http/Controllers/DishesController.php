<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\DishCreateRequest;
use App\Http\Requests\DishUpdateRequest;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dish::all();
        return view('kitchen.dish', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('kitchen.dish_create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DishCreateRequest $request)
    {
        $dish = new Dish();
        $dish->name = $request->name;
        $dish->category_id = $request->category;

        $imageName = date('YmdHis') . "." . request()->image_path->getClientOriginalExtension();
        request()->image_path->move(public_path('images'), $imageName);
        $dish->image = $imageName;

        $dish->save();
        return redirect('dish')->with('message', 'Dish created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        $categories = Category::all();
        return view('kitchen.dish_edit', compact('dish', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DishUpdateRequest $request, Dish $dish)
    {
        $dish->name = $request->name;
        $dish->category_id = $request->category;

        if ($request->image_path) {
            $imageName = date('YmdHis') . "." . request()->image_path->getClientOriginalExtension();
            request()->image_path->move(public_path('images'), $imageName);
            $dish->image = $imageName;
        }
        $dish->save();

        return redirect('dish')->with('message', 'Dish Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect('dish')->with('message', 'Dish deleted successfully');
    }

    public function order()
    {
        $rawStatus = config('orderrequest.order_status');
        $status = array_flip($rawStatus);
        $orders = Order::whereIn('status', [1, 2])->get();
        return view('kitchen.order', compact('orders', 'status'));
    }

    public function approve(Order $order)
    {
        $order->status = config('orderrequest.order_status.processing');
        $order->save();
        return redirect('order')->with('message', 'This order is approved');
    }

    public function cancel(Order $order)
    {
        $order->status = config('orderrequest.order_status.cancel');
        $order->save();
        return redirect('order')->with('message', 'This order is rejected');
    }

    public function ready(Order $order)
    {
        $order->status = config('orderrequest.order_status.ready');
        $order->save();
        return redirect('order')->with('message', 'This order is ready!');
    }
}
