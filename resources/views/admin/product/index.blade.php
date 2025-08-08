@extends('layouts.app')
@php $pageTitle = 'Manage Products' @endphp
@section('content')

<div class="flex justify-between items-center mb-4 header-main">
    <h3 class="text-xl font-semibold">Products</h3>
    <div
        x-data="{ show: @json(session('success') !== null), message: '{{ session('success') }}' }"
        x-show="show"
        x-init="setTimeout(() => show = false, 4000)"
        class="fixed top-5 right-5 z-50 flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
        role="alert"
        x-cloak>
        <div class="text-sm font-normal" x-text="message"></div>
    </div>


    <!-- Use <a> tag properly with an href attribute -->
    <a href="{{route('products.create')}}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        Add Product
    </a>
</div>


<div class="relative w-full max-w-md mx-auto">
  <input
    type="text"
    id="myInput"
    onkeyup="myFunction()"
    placeholder="🔍 Search by name, SKU, or description"
    class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition placeholder-gray-400 text-sm"
  >
  <button
    type="button"
    onclick="document.getElementById('myInput').value=''; myFunction();"
    class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none"
    title="Clear"
  >
   
  </button>
</div>


<div class="relative overflow-x-auto pb-24">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="myTable">

        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class="header">
                <th scope="col" class="px-6 py-3">S.N</th>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">SKU</th>
                <th scope="col" class="px-6 py-3">Qty</th>
                <th scope="col" class="px-6 py-3">Price</th>
                <!-- <th scope="col" class="px-6 py-3">Category</th> -->
                <th scope="col" class="px-4 py-3 max-w-xs truncate">Description</th>
                <th scope="col" class="px-6 py-3">Status</th>
                <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
            $sn = 1;
            @endphp
            @foreach ($products as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <td class="px-6 py-4">{{ $sn++ }}</td>
                <td class="px-6 py-4">{{ $item->product_name }}</td>
                <td class="px-6 py-4">{{ $item->product_sku }}</td>
                <td class="px-6 py-4">{{ $item->product_quantity }}</td>
                <td class="px-6 py-4">{{ $item->product_price }}</td>
                <!-- In your table loop -->
                <td class="px-6 py-4 truncate cursor-pointer"
                    data-tooltip-target="desc-tooltip-{{ $loop->index }}"
                    data-tooltip-content="{{ $item->product_description }}">
                    {{ \Str::limit($item->product_description, 30) }}
                </td>

                <!-- Tooltip for this specific row -->
                <div id="desc-tooltip-{{ $loop->index }}" class="invisible absolute z-[9999] bg-white text-black text-sm border border-gray-300 rounded shadow-lg px-3 py-2 max-w-xs pointer-events-none">
                    <div class="desc-tooltip-content"></div>
                </div>

                <td>
                    <form action="{{route('change.product.status')}}" method="post" id="productStatus-{{ $item->id }}">
                        @csrf
                        <div class="flex items-center">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer" {{ $item->product_status !== '0' ? 'checked' : '' }}
                                    onchange="document.getElementById('productStatus-{{ $item->id }}').submit()">
                                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $item->product_status !== '0' ? 'Active' : 'Inactive' }}</span>
                            </label>
                        </div>
                        <input type="hidden" name="product_id" value="{{$item->id}}">
                    </form>
                </td>


                <td>
                    <!-- Modal toggle -->
                    <button data-modal-target="default-modal{{$item->id}}"
                        data-modal-toggle="default-modal{{$item->id}}"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                        type="button"
                        title="Delete">
                        <!-- X Icon with updated size -->
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>


                    <!-- Main modal -->
                    <div id="default-modal{{$item->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Confirmation for deletion
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal{{$item->id}}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5 space-y-4">
                                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                        Are you sure you want to delete this product?
                                    </p>
                                </div>
                                <!-- Modal footer -->
                                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <form action="{{ route('products.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Yes</button>
                                    </form>
                                    <button data-modal-hide="default-modal{{$item->id}}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('products.edit', $item->id) }}"
                        class="inline-flex items-center justify-center text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800"
                        title="Edit Product">
                        <!-- Heroicons pencil (outline) -->
                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 3.487a2.25 2.25 0 113.182 3.182L7.5 19.313 3 21l1.687-4.5L16.862 3.487z" />
                        </svg>
                    </a>

                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
      <div class="mt-4">
    {{ $products->links() }}
</div>

</div>



@endsection