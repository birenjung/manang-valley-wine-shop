<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(15);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product_categories = ProductCategory::where('product_category_status', '1')->get();
        return view('admin.product.create', compact('product_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */



    public function store(Request $request)
    {

        try {
            $validated = $request->validate([
                'product_name' => 'required|string|max:255',
                'product_quantity' => 'required|integer|min:0',
                'product_price' => 'required|numeric|min:0',
                'product_description' => 'nullable|string',
                // 'product_product_category_id' => 'required|exists:product_categories,id',
                'product_photo' => 'nullable|array',
                // 'product_photo.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            // Generate a unique SKU
            $validated['product_sku'] = $this->generateUniqueSku();

            // Handle photo uploads (if applicable)
            $coverPhotoPaths = [];
            $imagesFolder = public_path('be-assets/products/images/');
            $basePath = 'be-assets/products/images/';
            $key = 1;

            // Ensure directory exists
            if (!is_dir($imagesFolder)) {
                mkdir($imagesFolder, 0755, true);
            }

            if ($request->product_photo) {
                foreach ($request->file('product_photo') as $photo) {
                    if ($photo instanceof UploadedFile) {
                        $filename = time() . rand(1000, 9999) . '-' . strtolower($photo->getClientOriginalName());
                        $photo->move($imagesFolder, $filename);
                        $coverPhotoPaths[(string) $key++] = $basePath . $filename;  // key as string!
                    }
                }
            }

            $validated['product_photo'] = empty($coverPhotoPaths) ? null : $coverPhotoPaths;

            // Create product
            Product::create($validated);
        } catch (Exception $th) {
            // dd($th);
        }


        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }



    private function generateUniqueSku(): string
    {
        $sku = 'PRD-' . now()->format('Ymd') . '-' . Str::upper(Str::random(6));
        return $sku;
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
        $product = Product::find($id);
        $product_categories = ProductCategory::where('product_category_status', '1')->get();
        return view('admin.product.edit', compact('product_categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'product_quantity' => 'required|integer|min:0',
            'product_price' => 'required|numeric|min:0',
            'product_description' => 'nullable|string',
            'product_photo' => 'nullable|array',
        ]);

        $existingPhotos = $product->product_photo ?? [];

        // Make sure it's a proper array
        if (!is_array($existingPhotos)) {
            $existingPhotos = [];
        }

        // Handle photo uploads (if applicable)
        $coverPhotoPaths = [];
        $imagesFolder = public_path('be-assets/products/images/');
        $basePath = 'be-assets/products/images/';
        $key = 1;

        // Ensure directory exists
        if (!is_dir($imagesFolder)) {
            mkdir($imagesFolder, 0755, true);
        }

        if ($request->product_photo) {
            foreach ($request->file('product_photo') as $photo) {
                if ($photo instanceof UploadedFile) {
                    $filename = time() . rand(1000, 9999) . '-' . strtolower($photo->getClientOriginalName());
                    $photo->move($imagesFolder, $filename);
                    $coverPhotoPaths[(string) $key++] = $basePath . $filename;  // key as string!
                }
            }
        }

        // Merge new photos with existing ones
        $allPhotos = array_merge($existingPhotos, $coverPhotoPaths);

        // Reindex with keys like "1", "2", ...
        $reindexed = [];
        $i = 1;
        foreach ($allPhotos as $path) {
            $reindexed[(string) $i++] = $path;
        }

        $validated['product_photo'] = empty($reindexed) ? null : $reindexed;

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }







    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('success', 'The product is deleted successfully.');
    }



    public function removeCoverPhoto(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'key' => 'required',
        ]);

        $product = Product::findOrFail($request->product_id);
        $coverPhotos = $product->product_photo ?? [];

        // Delete file
        $photoPath = public_path($coverPhotos[$request->key]);
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }

        // Remove photo from array without reindexing
        unset($coverPhotos[$request->key]);

        // Save without touching keys
        $product->product_photo = $coverPhotos;
        $product->save();

        return response()->json(['status' => 200, 'msg' => 'Cover photo removed.']);
    }


    function changeProductStatus(Request $request)
    {
        $productId = $request->product_id;
        $product = Product::find($productId);

        if ($product->product_status == '1') {
            $product->product_status = '0';
            $product->save();
            return redirect()->back()->with('success', 'Product status changed to inactive.');
        } else {
            $product->product_status = '1';
            $product->save();
            return redirect()->back()->with('success', 'Product status changed to active.');
        }
    }
}
