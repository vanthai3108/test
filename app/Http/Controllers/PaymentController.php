<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Song;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $songs = Song::query()
            ->with(['singers', 'genre', 'payments'])
            ->whereHas('payments', function ($query) {
                $query->where('user_id', auth()->id());
            })->paginate(5);
        return view('buy-songs', [
            "songs" => $songs
        ]);
    }
}
