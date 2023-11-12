<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $top10Views = Song::query()->orderBy('song_views', 'desc')->take(10)->get();
        $top10Likes = Song::query()->orderBy('song_likes', 'desc')->take(10)->get();
        $top10News = Song::query()->orderBy('created_at', 'desc')->take(10)->get();
        return view('home', [
            "top10Views" => $top10Views,
            "top10Likes" => $top10Likes,
            "top10News" => $top10News
        ]);
    }
}
