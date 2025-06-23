<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderFilterRequest;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */

  public function index(Request $request)
{
    try {
        // Manually get filter inputs from request
        $filters = $request->only([
            'search', 'status', 'payment_status', 'date_from', 'date_to', 'customer_id',
             'sort_direction', 'per_page'
        ]);

        // Provide default values for sorting and pagination
        $perPage = $filters['per_page'] ?? 15;
        $sortBy = 'created_at';
      
        $sortDirection = $filters['sort_direction'] ?? 'desc';

        $query = Order::query();

        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('order_user_fullname', 'like', "%{$search}%")
                  ->orWhere('order_user_email', 'like', "%{$search}%")
                  ->orWhere('order_user_phone', 'like', "%{$search}%");
            });
        } else {
            $search = null;
        }

        if (!empty($filters['status'])) {
            $query->where('order_status', $filters['status']);
        }

        if (!empty($filters['payment_status'])) {
            $query->where('payment_status', $filters['payment_status']);
        }

        if (!empty($filters['date_from'])) {
            $query->whereDate('order_date', '>=', $filters['date_from']);
        }

        if (!empty($filters['date_to'])) {
            $query->whereDate('order_date', '<=', $filters['date_to']);
        }

        if (!empty($filters['customer_id'])) {
            $query->where('user_id', $filters['customer_id']);
        }

        $orders = $query->orderBy($sortBy, $sortDirection)
                        ->paginate($perPage)
                        ->withQueryString();

        $customers = User::where('role', 2)->select('id', 'name')->get();

        return view('admin.orders.index', compact('orders', 'customers', 'search'));
    } catch (Exception $e) {
        logger()->error('OrderController@index error: ' . $e->getMessage());
        abort(500, 'Internal Server Error');
    }
}


     
    // public function index(Request $request)
    // {
    //     $query = Order::query();

    //     if ($request->filled('search')) {
    //         $search = $request->search;

    //         $query->where(function ($q) use ($search) {
    //             $q->where('order_user_fullname', 'like', "%$search%")
    //                 ->orWhere('order_status', 'like', "%$search%")
    //                 ->orWhere('payment_status', 'like', "%$search%");
    //         });
    //     }

    //     $orders = $query->latest()->paginate(10)->appends($request->query());

    //     return view('admin.orders.index', compact('orders'));
    // }


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
