<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index(Request $request)
    {
        $songs = Song::query()
            ->with(['singers', 'genre'])
            ->when($request->search, function ($query, $search) {
                $query->where('song_name', 'like', "%{$search}%")
                ->orWhereHas('singers', function ($query) use ($search) {
                        $query->where('singer_name', 'like', "%{$search}%");
                    })
                ->orWhereHas('genre', function ($query) use ($search) {
                    $query->where('genre_name', 'like', "%{$search}%");
                });
            })
            ->paginate(10);
        return view('song-list', [
            "songs" => $songs
        ]);
    }

    public function show(Song $song)
    {
        $song->update([
            'song_views' => $song->song_views + 1
        ]);
        $isBuy = $song->payments()->where('user_id', auth()->id())->exists();
        return view('song', [
            "song" => $song,
            'isBuy' => $isBuy
        ]);
    }

    public function like(Song $song)
    {
        $song->update([
            'song_likes' => $song->song_likes + 1
        ]);
        return redirect()->back();
    }
}
