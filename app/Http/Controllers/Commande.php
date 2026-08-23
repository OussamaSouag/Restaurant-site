<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use App\Mail\PurchaseRequestMail;

class Commande extends Controller
{

public function submitBuyForm(Request $request)
{
    $user = \Illuminate\Support\Facades\Auth::user();
    $products = $request->input('products'); // ['product_id' => quantity]

    // 1. Create a new command
    $command = \App\Models\Commande::create([
        'client_id' => $user->id,
        'status' => 'pending',
        'total' => 0,
    ]);

    $total = 0;

    // 2. Attach products to the command
    foreach ($products as $productId => $quantity) {
        if ($quantity > 0) {
            $product = Product::find($productId);
            $command->products()->attach($productId, ['quantity' => $quantity]);
            $total += $product->price * $quantity;
        }
    }

    // 3. Update command total
    $command->update(['total' => $total]);
    // 4. Send confirmation email
    $purchaseData = [
        'user' => $user,
        'command' => $command,
        'products' => $command->products()->withPivot('quantity')->get(),
        'total' => $total,
    ];

    return redirect()->back()->with('success', 'Order submitted and saved.');
}

}
