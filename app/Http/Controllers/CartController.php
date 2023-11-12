<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Payment;
use App\Models\Song;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $songs = Song::query()
            ->with(['singers', 'genre'])
            ->whereHas('carts', function ($query) {
                $query->where('user_id', auth()->id());
            })->get();
        return view('cart', [
            "songs" => $songs
        ]);
    }

    public function add(Song $song)
    {
        Cart::firstOrCreate([
            'user_id' => auth()->id(),
            'song_id' => $song->id,
        ]);
        return redirect()->route('cart.index');
    }

    public function delete(Song $song)
    {
        Cart::where([
            'user_id' => auth()->id(),
            'song_id' => $song->id,
        ])->delete();
        return redirect()->route('cart.index');
    }

    public function pay(Request $request)
    {
        foreach (auth()->user()->carts as $cart) {
            Payment::firstOrCreate([
                'user_id' => auth()->id(),
                'song_id' => $cart->song_id,
                'payment_date' => now(),
                'payment_bank' => $request->payment_bank ,
            ]);
            $cart->delete();
        }

        return redirect()->route('pay.index');
    }

}
