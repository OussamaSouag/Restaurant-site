<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Commande;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommandePrete;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);

        $commands = Commande::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $users = User::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $now = Carbon::now();
        $lastMonth = $now->copy()->subMonth();

        $thisMonthCommands = Commande::whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->count();

        $lastMonthCommands = Commande::whereMonth('created_at', $lastMonth->month)
            ->whereYear('created_at', $lastMonth->year)
            ->count();

        $thisMonthUsers = User::whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->count();

        $lastMonthUsers = User::whereMonth('created_at', $lastMonth->month)
            ->whereYear('created_at', $lastMonth->year)
            ->count();

        $thisMonthGain = DB::table('commande_produits')
            ->join('commandes', 'commande_produits.commande_id', '=', 'commandes.id')
            ->join('products', 'commande_produits.produit_id', '=', 'products.id')
            ->whereMonth('commandes.created_at', $now->month)
            ->whereYear('commandes.created_at', $now->year)
            ->sum(DB::raw('products.price * commande_produits.quantite'));

        $lastMonthGain = DB::table('commande_produits')
            ->join('commandes', 'commande_produits.commande_id', '=', 'commandes.id')
            ->join('products', 'commande_produits.produit_id', '=', 'products.id')
            ->whereMonth('commandes.created_at', $lastMonth->month)
            ->whereYear('commandes.created_at', $lastMonth->year)
            ->sum(DB::raw('products.price * commande_produits.quantite'));

        return view('admin.AdminPanel', compact(
            'products',
            'commands',
            'users',
            'thisMonthCommands',
            'lastMonthCommands',
            'thisMonthUsers',
            'lastMonthUsers',
            'thisMonthGain',
            'lastMonthGain'
        ));
    }


public function commandes()
{
    $commandes = Commande::with(['user', 'products'])->paginate(10);
    return view('admin.adminCommande', compact('commandes'));
}

   public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:En_attente,En_préparation,Prête',
    ]);

    $commande = Commande::findOrFail($id);
    $commande->statut = $request->status; // Ton champ s'appelle 'statut'
    $commande->save();

    // Si le statut est "Prête", envoyer un email à l'utilisateur
    if ($commande->statut === 'Prête') {
        $user = $commande->user; // Assure que tu as bien $commande->user() dans le modèle

        if ($user && $user->email) {
            Mail::to($user->email)->send(new CommandePrete($commande));
        }
    }

    return redirect()->back()->with('success', 'Statut de la commande mis à jour.');
}
}
