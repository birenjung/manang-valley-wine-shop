@extends('layouts.app')
@section('content')

@php
use App\Models\Product;
use Illuminate\Support\Carbon;
@endphp

<div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6 gap-4 header-main">
    <h3 class="text-2xl font-bold text-gray-800 dark:text-white">Orders</h3>

    {{-- Success Notification --}}
    <div
        x-data="{ show: @json(session('success') !== null), message: '{{ session('success') }}' }"
        x-show="show"
        x-init="setTimeout(() => show = false, 4000)"
        class="fixed top-5 right-5 z-50 flex items-center w-full max-w-xs p-4 text-white bg-green-600 rounded-lg shadow-md"
        role="alert"
        x-cloak
    >
        <div class="text-sm font-medium" x-text="message"></div>
    </div>
</div>



<form method="GET" action="{{ route('orders.index') }}" class="mb-6 space-y-4 sm:space-y-0 sm:flex sm:items-end sm:gap-4 flex-wrap">
    <!-- Search -->
    <!-- <div class="flex-1 min-w-[220px]">
        <label for="search" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Search</label>
        <input
            type="text"
            id="search"
            name="search"
            value="{{ request('search') }}"
            placeholder="Name, email, phone..."
            class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:text-white"
        >
    </div> -->

    <!-- Customer name filter -->

   

    <div class="min-w-[160px]">
        <label for="customer" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Customer Name</label>
        <select
            id="customer"
            name="customer"
            class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 dark:bg-gray-800 dark:text-white"
        >
            <option value="">All</option>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Order Status -->
    <div class="min-w-[160px]">
        <label for="status" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Order Status</label>
        <select
            id="status"
            name="status"
            class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 dark:bg-gray-800 dark:text-white"
        >
            <option value="">All</option>
            @foreach(['pending', 'processing', 'shipped', 'delivered', 'cancelled'] as $status)
                <option value="{{ $status }}" @selected(request('status') == $status)>{{ ucfirst($status) }}</option>
            @endforeach
        </select>
    </div>

    <!-- Payment Status -->
    <div class="min-w-[160px]">
        <label for="payment_status" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Payment Status</label>
        <select
            id="payment_status"
            name="payment_status"
            class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-green-500 dark:bg-gray-800 dark:text-white"
        >
            <option value="">All</option>
            @foreach(['unpaid', 'paid', 'refunded'] as $pstatus)
                <option value="{{ $pstatus }}" @selected(request('payment_status') == $pstatus)>{{ ucfirst($pstatus) }}</option>
            @endforeach
        </select>
    </div>

    <!-- Date From -->
    <div class="min-w-[160px]">
        <label for="date_from" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">From Date</label>
        <input
            type="date"
            id="date_from"
            name="date_from"
            value="{{ request('date_from') }}"
            class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-purple-500 dark:bg-gray-800 dark:text-white"
        >
    </div>

    <!-- Date To -->
    <div class="min-w-[160px]">
        <label for="date_to" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">To Date</label>
        <input
            type="date"
            id="date_to"
            name="date_to"
            value="{{ request('date_to') }}"
            class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-purple-500 dark:bg-gray-800 dark:text-white"
        >
    </div>

  

    <!-- Sort Direction -->
    <div class="min-w-[120px]">
        <label for="sort_direction" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Sort Direction</label>
        <select
            id="sort_direction"
            name="sort_direction"
            class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-pink-500 dark:bg-gray-800 dark:text-white"
        >
            <option value="desc" @selected(request('sort_direction') == 'desc')>Descending</option>
            <option value="asc" @selected(request('sort_direction') == 'asc')>Ascending</option>
        </select>
    </div>

    <!-- Per Page -->
    <div class="min-w-[120px]">
        <label for="per_page" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Per Page</label>
        <input
            type="number"
            id="per_page"
            name="per_page"
            min="1"
            max="100"
            value="{{ request('per_page', 15) }}"
            class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 dark:bg-gray-800 dark:text-white"
        >
    </div>

    <!-- Submit Button -->
    <div class="flex items-end">
        <button
            type="submit"
            class="px-5 py-2 bg-blue-600 hover:bg-blue-700 rounded-md text-white font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
        >
            Filter
        </button>
    </div>
</form>





<div class="relative overflow-x-auto pb-24">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="myTable">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class="header">
                <th class="px-2 py-3">S.N</th>
                <th class="px-2 py-3">Order Date</th>
                <th class="px-2 py-3">Full Name</th>
                <th class="px-2 py-3">Email</th>
                <th class="px-2 py-3">Phone</th>

                <th class="px-2 py-3">Total</th>
                <th class="px-2 py-3">Status</th>


                <th class="px-2 py-3">Pay Status</th>
                <th class="px-2 py-3">Method</th>
                <th class="px-2 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php $sn = 1; @endphp
            @foreach ($orders as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-2 py-2">{{ $sn++ }}</td>
               <td class="px-2 py-2 text-sm text-gray-800">
    <span class="font-medium">
        {{ \Carbon\Carbon::parse($item->order_date)->toDateString() }}
    </span>
    <span class="ml-2 text-xs text-gray-500 italic">
        ({{ \Carbon\Carbon::parse($item->order_date)->diffForHumans() }})
    </span>
</td>


                <td class="px-2 py-2 truncate max-w-[120px]">{{ $item->order_user_fullname }}</td>
                <td class="px-2 py-2 truncate max-w-[140px]">{{ $item->order_user_email }}</td>
                <td class="px-2 py-2">{{ $item->order_user_phone }}</td>




                <td class="px-2 py-2">{{ $item->order_total }}</td>
                <td class="px-2 py-2 flex items-center gap-2">
                    <form action="{{ route('orders.updateStatus') }}" method="POST">
                        @csrf

                        <input type="hidden" name="order_id" value="{{ $item->id }}">
                        <select name="order_status" onchange="this.form.submit()"
                            class="block w-full px-2 py-1 border rounded-md text-sm shadow">
                            <option value="pending" {{ $item->order_status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" {{ $item->order_status == 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="shipped" {{ $item->order_status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="delivered" {{ $item->order_status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                            <option value="cancelled" {{ $item->order_status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </form>

                    <span class="
        text-xs font-semibold px-2 py-1 rounded
        {{ match($item->order_status) {
            'pending' => 'bg-gray-200 text-gray-700',
            'processing' => 'bg-orange-100 text-orange-600',
            'shipped' => 'bg-blue-100 text-blue-600',
            'delivered' => 'bg-green-100 text-green-600',
            'cancelled' => 'bg-red-100 text-red-600',
            default => 'bg-gray-100 text-gray-500',
        } }}
    ">
                        @php


                        $status = $item->order_status;
                        $statusChangedDate = $item->status_change_date
                        ? Carbon::parse($item->status_change_date)->diffForHumans()
                        : 'N/A';

                        $badgeClasses = match($status) {
                        'pending' => 'bg-gray-200 text-gray-700',
                        'processing' => 'bg-orange-100 text-orange-600',
                        'shipped' => 'bg-blue-100 text-blue-600',
                        'delivered' => 'bg-green-100 text-green-600',
                        'cancelled' => 'bg-red-100 text-red-600',
                        default => 'bg-gray-100 text-gray-500',
                        };
                        @endphp

                        <div class="flex flex-col gap-1">
                            <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full {{ $badgeClasses }}">
                                {{ ucfirst($status) }}
                            </span>
                            <span class="text-xs text-gray-500">
                                {{ $statusChangedDate }}
                            </span>
                        </div>

                    </span>
                </td>





                <td>
                    <form action="{{route('change.payment.status')}}" method="post" id="payment-{{ $item->id }}">
                        @csrf
                        <div class="flex items-center">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer" {{ $item->payment_status !== 'unpaid' ? 'checked' : '' }}
                                    onchange="document.getElementById('payment-{{ $item->id }}').submit()">
                                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                                <!-- <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300" id="paymentStatus">{{ $item->payment_status !== 'unpaid' ? 'True' : 'False' }}</span> -->
                            </label>
                        </div>
                        <input type="hidden" name="order_id" value="{{$item->id}}">
                    </form>
                </td>

                <td class="px-2 py-2">{{ $item->payment_method ?? '-' }}</td>

                <td class="px-2 py-2">
                    <!-- Delete Button -->
                    <button data-modal-target="delete-modal-{{ $item->id }}"
                        data-modal-toggle="delete-modal-{{ $item->id }}"
                        class="text-red-600 hover:text-red-800">
                        Delete
                    </button>



                    @if(count($item['orderItems']) > 0)
                    <button data-modal-target="products-modal-{{ $item['id'] }}"
                        data-modal-toggle="products-modal-{{ $item['id'] }}"
                        class="text-blue-600 hover:text-blue-800">
                        View
                    </button>
                    <!-- Product Modal -->
                    <div id="products-modal-{{ $item->id }}" tabindex="-1" class="hidden fixed inset-0 z-50 overflow-y-auto overflow-x-hidden">
                        <div class="relative p-4 w-full max-w-2xl m-auto">

                            <div class="bg-white rounded-lg shadow dark:bg-gray-700">
                                <div class="flex justify-between items-center p-4 border-b dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Ordered Products
                                    </h3>
                                    <button type="button" class="text-gray-400 hover:text-gray-900 dark:hover:text-white"
                                        data-modal-hide="products-modal-{{ $item->id }}">
                                        ✕
                                    </button>
                                </div>
                                <div class="p-4 text-sm text-gray-700 dark:text-gray-300 whitespace-pre-line">
                                    <table class="w-full text-left">
                                        <thead>
                                            <tr>
                                                <th class="p-2">Product Name</th>
                                                <th class="p-2">Price</th>
                                                <th class="p-2">Quantity</th>
                                                <!-- <th class="p-2">Description</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($item->orderItems as $productOrder)
                                            @php
                                            $originalProduct = \App\Models\Product::find($productOrder->product_id);

                                            @endphp

                                            @if($originalProduct)
                                            <tr>
                                                <td class="p-2">{{ $originalProduct->product_name }}</td>
                                                <td class="p-2">{{ $originalProduct->product_price ?? '-' }}</td>
                                                <td class="p-2">{{ $originalProduct->product_quantity ?? '-' }}</td>
                                                <!-- <td class="p-2">{{ $originalProduct->product_description ?? '-' }}</td> -->
                                            </tr>
                                            @else
                                            <tr>
                                                <td colspan="4" class="p-2 text-red-500">Product not found</td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif


                </td>
            </tr>





            <!-- Delete Confirmation Modal -->
            <div id="delete-modal-{{ $item->id }}" tabindex="-1" class="hidden fixed inset-0 z-50 overflow-y-auto overflow-x-hidden">
                <div class="relative p-4 w-full max-w-md m-auto">
                    <div class="bg-white rounded-lg shadow dark:bg-gray-700">
                        <div class="flex justify-between items-center p-4 border-b dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Delete Confirmation
                            </h3>
                            <button type="button" class="text-gray-400 hover:text-gray-900 dark:hover:text-white"
                                data-modal-hide="delete-modal-{{ $item->id }}">
                                ✕
                            </button>
                        </div>
                        <div class="p-4 text-sm text-gray-700 dark:text-gray-300">
                            Are you sure you want to delete this order?
                        </div>
                        <div class="flex justify-end p-4 border-t dark:border-gray-600">
                            <form action="{{ route('orders.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 text-white px-4 py-2 rounded mr-2 hover:bg-red-700">Yes</button>
                            </form>
                            <button type="button" data-modal-hide="delete-modal-{{ $item->id }}"
                                class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">No</button>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
    {{ $orders->links() }}
</div>


</div>

@endsection