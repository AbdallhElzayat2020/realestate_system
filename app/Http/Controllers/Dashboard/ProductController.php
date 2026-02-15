<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(15);
        return view('dashboard.pages.products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('dashboard.pages.products.show', compact('product'));
    }

    public function create()
    {
        return view('dashboard.pages.products.create');
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $product = new Product();
        $product->status = $data['status'] ?? 'active';
        $product->setTranslations('name', $data['name']);
        $product->setTranslations('description', $data['description'] ?? []);
        $product->slug = !empty($data['slug']) ? $data['slug'] : Product::generateUniqueSlug($data['name']['en']);

        if ($request->hasFile('image')) {
            if (!File::exists(public_path('products'))) {
                File::makeDirectory(public_path('products'), 0755, true);
            }

            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('products'), $filename);
            $product->image = 'products/' . $filename;
        }
        $product->save();
        return redirect()->route('dashboard.products.index')->with('success', 'Product created successfully');
    }

    public function edit(Product $product)
    {
        return view('dashboard.pages.products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $product->status = $data['status'] ?? $product->status;
        $product->setTranslations('name', $data['name']);
        $product->setTranslations('description', $data['description'] ?? []);
        if (empty($data['slug']) || ($data['name']['en'] ?? '') !== ($product->getTranslation('name', 'en') ?? '')) {
            $product->slug = Product::generateUniqueSlug($data['name']['en']);
        } else {
            $product->slug = $data['slug'];
        }
        if ($request->hasFile('image')) {
            if ($product->image && File::exists(public_path($product->image))) {
                File::delete(public_path($product->image));
            }

            if (!File::exists(public_path('products'))) {
                File::makeDirectory(public_path('products'), 0755, true);
            }

            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('products'), $filename);
            $product->image = 'products/' . $filename;
        }
        $product->save();
        return redirect()->route('dashboard.products.index')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            if (File::exists(public_path($product->image))) {
                File::delete(public_path($product->image));
            }
        }
        $product->delete();
        return redirect()->route('dashboard.products.index')->with('success', 'Product deleted successfully');
    }
}
