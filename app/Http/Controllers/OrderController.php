<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('orderItems')->get();
        // dd($orders->toArray());
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    function changeOrderStatus(Request $request)
    {
        // dd($request->all());
        $orderId = $request->order_id;
        $order = Order::find($orderId);
        $order->order_status = $request->order_status;
        $order->status_change_date = Carbon::now();
        $order->save();

        return redirect()->back()->with('success', 'The order status is changed successfully.');
    }

    function changePayStatus(Request $request)
    {
        $orderId = $request->order_id;
        $order = Order::find($orderId);

        // $order->status_change_date = Carbon::now();
        if ($order->payment_status == 'unpaid') {
            $order->payment_status = 'paid';
            $order->save();
            return redirect()->back()->with('success', 'The payment has been paid successfully.');
        } else {
            $order->payment_status = 'unpaid';
            $order->save();
            return redirect()->back()->with('success', 'The payment has not been paid.');
        }
    }
}
