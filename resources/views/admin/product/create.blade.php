@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="flex justify-between items-center mb-4 header-main">
        <h3 class="text-xl font-semibold">ADD A PRODUCT</h3>

        <button onclick="history.back()" class="flex items-center gap-2 px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            Back
        </button>

    </div>

    <div class="mini-wrapper">
        <section class="bg-white dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a product</h2>
                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 mb-5">
                        <!-- Product Name -->
                        <div class="sm:col-span-2">
                            <label for="product_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Product Name
                            </label>
                            <input type="text" name="product_name" id="product_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ old('product_name') }}" required>
                            <x-input-error :messages="$errors->get('product_name')" class="mt-2" />
                        </div>

                        <!-- Product Quantity -->
                        <div class="w-full">
                            <label for="product_quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Product Quantity
                            </label>
                            <input type="number" name="product_quantity" id="product_quantity"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ old('product_quantity') }}" required>
                            <x-input-error :messages="$errors->get('product_quantity')" class="mt-2" />
                        </div>

                        <!-- Product Price -->
                        <div class="w-full">
                            <label for="product_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Product Price
                            </label>
                            <input type="number" step="0.01" name="product_price" id="product_price"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ old('product_price') }}" required>
                            <x-input-error :messages="$errors->get('product_price')" class="mt-2" />
                        </div>

                        <!-- Product SKU -->
                        <!-- <div class="w-full">
                            <label for="product_sku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Product SKU
                            </label>
                            <input type="text" name="product_sku" id="product_sku"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ old('product_sku') }}" required>
                            <x-input-error :messages="$errors->get('product_sku')" class="mt-2" />
                        </div> -->

                        <!-- Product Category Dropdown -->
                        <!-- <div class="w-full">
                            <label for="product_product_category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Category
                            </label>
                            <select name="product_product_category_id" id="product_product_category_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="">-- Select Category --</option>
                                @foreach ($product_categories as $category)
                                <option value="{{ $category->id }}" {{ old('product_product_category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->product_category_name }}
                                </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('product_product_category_id')" class="mt-2" />
                        </div> -->

                        <div class="sm:col-span-2">
                            <label for="product_photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Product Photo</label>
                            <div id="product_photo_drop_area" class="flex items-center justify-center w-full">
                                <label for="product_photo_input"
                                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div id="preview_container" class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg id="product_photo_svg_icon" class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p id="product_photo_drop_text" class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400"><span class="font-semibold">YOU MAY UPLOAD MULTIPLE IMAGES</span></p>

                                    </div>
                                    <input id="product_photo_input" type="file" name="product_photo[]" class="hidden" multiple />
                                </label>
                            </div>
                            <!-- <div id="product_photo_preview_container" class="mt-4 flex flex-wrap gap-2"></div> -->
                            <!-- Progress bar and status message -->
                            <!-- <div id="product_photo_progress_wrapper" class="mt-4 hidden">
                                <div class="w-full bg-gray-200 rounded-full h-2.5 mb-2 dark:bg-gray-700">
                                    <div id="product_photo_progress_bar" class="bg-green-600 h-2.5 rounded-full w-0 transition-all duration-500"></div>
                                </div>
                                <p id="product_photo_status" class="text-sm text-gray-700 dark:text-gray-300">Previewing...</p>
                            </div> -->

                        </div>

                        <!-- Product Description -->
                        <div class="sm:col-span-2">
                            <label for="product_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Product Description
                            </label>
                            <textarea id="product_description" name="product_description" rows="6"
                                class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-primary-600 focus:border-primary-600">{{ old('product_description') }}</textarea>
                            <x-input-error :messages="$errors->get('product_description')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="inline-flex items-center gap-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        Submit
                    </button>
                </form>

            </div>
        </section>

    </div>
</div>



@endsection