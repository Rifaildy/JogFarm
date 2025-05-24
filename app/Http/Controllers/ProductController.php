<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\LocationService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreProductRequest;


class ProductController extends Controller
{
    protected $locationService;

    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }
    
    public function beranda()
    {
        $products = Product::all(); // You might want to paginate or filter this in a real app
        return view('user.beranda', compact('products'));
    }

    public function produk()
    {
        $products = Product::all(); // You might want to paginate or filter this in a real app
        return view('user.produk', compact('products'));
    }

    public function detailProduk($id)
    {
        $product = Product::findOrFail($id);
        return view('user.detailProduk', compact('product'));
    }

    public function chat()
    {
        return view('user.chat');
    }
    public function notif()
    {
        return view('user.notif');
    }
    public function akun()
    {
        return view('user.akun');
    }
    public function jual()
    {
        return view('user.jual');
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // Upload image
        if ($request->hasFile('productImage')) {
            $imagePath = $request->file('productImage')->store('products', 'public');
            $validated['image_path'] = $imagePath;
        }

        // Create product
        Product::create([
            'category' => $validated['category'],
            'product_name' => $validated['productName'],
            'description' => $validated['productDescription'],
            'price' => $validated['productPrice'],
            'image_path' => $validated['image_path'],
        ]);
        Alert::success('Success', 'Produk Berhasil Diunggah');
        return redirect()->back();
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('user.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->product_name = $request->input('productName');
        $product->description = $request->input('productDescription');
        $product->price = $request->input('productPrice');
        
        if ($request->hasFile('productImage')) {
            $imagePath = $request->file('productImage')->store('images', 'public');
            $product->image_path = $imagePath;
        }

        $product->save();
        Alert::success('Success', 'Produk Berhasil Diperbarui');
        return redirect()->route('produk');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        Alert::success('Success', 'Produk Berhasil Dihapus');
        return redirect()->route('produk');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'description' => 'required',
    //         'price' => 'required|numeric',
    //         'category_id' => 'required',
    //         'location' => 'required'
    //     ]);

    //     $locationData = $this->locationService->getCoordinates($request->location);

    //     Product::create([
    //         'name' => $request->name,
    //         'description' => $request->description,
    //         'price' => $request->price,
    //         'category_id' => $request->category_id,
    //         'location' => $request->location,
    //         'latitude' => $locationData['latitude'],
    //         'longitude' => $locationData['longitude']
    //     ]);

    //     return redirect()->route('products.index')->with('success', 'Produk berhasil diupload');
    // }
}
