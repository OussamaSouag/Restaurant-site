<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Mail\PurchaseRequestMail;
use App\Models\Categorie;
use App\Models\Commande;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::paginate(10);
        $categories = Categorie::all();

        $query = Product::query();

        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->get();

        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        \Log::info('ProductController@store called'); // Log entry to confirm method call

        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|max:30720',
            'price' => 'nullable|numeric',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation
        ]);

        // Find the product
        $product = Product::find($id);

        // Handle the image upload if provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        // Update the product's name
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->user_id = auth()->id();
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product has been deleted successfully.');
    }

   public function buyProduct(Request $request, Product $product)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string',
            'phone' => 'required|string',
            'message' => 'nullable|string',
        ]);

        $user = auth()->user();
        if (!$user) {
            $userId = null;
        } else {
            $userId = $user->id;
        }

        // Create a new command (order)
        $command = Commande::create([
            'user_id' => $userId,
            'statut' => 'En_attente', // match enum values in migration
            'date_commande' => now(),
        ]);

        // Attach the product to the command with quantity 1
        $command->products()->attach($product->id, ['quantite' => 1]);

        // Prepare the data to send to the email
        $purchaseData = [
            'product_name' => $product->name,
            'user_name' => $request->name,
            'user_email' => $request->email,
            'user_address' => $request->address,
            'user_phone' => $request->phone,
            'user_message' => $request->message,
        ];

        // Send the email
        Mail::to('souagoussama11@gmail.com')->send(new PurchaseRequestMail($purchaseData));

        // Return response (redirect or confirmation message)
        return redirect()->route('products.index')->with('success', 'Your purchase request has been submitted!');
    }
    public function myOrders()
{
    $user = auth()->user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'You must be logged in to view your orders.');
    }

    $commandes = $user->commandes()->with('products')->latest()->get();

    return view('products.commandes', compact('commandes'));
}
}


