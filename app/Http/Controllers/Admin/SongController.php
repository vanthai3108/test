<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSongRequest;
use App\Http\Requests\UpdateSongRequest;
use App\Models\Genre;
use App\Models\Singer;
use App\Models\SingerSong;
use App\Models\Song;

class SongController extends Controller
{
    public function index()
    {
        $data = Song::paginate(10);

        return view("admin.songs.index", [
            "data" => $data
        ]);
    }

    public function create()
    {
        $genres = Genre::all();
        $singers = Singer::all();
        return view("admin.songs.create", [
            "genres" => $genres,
            "singers" => $singers
        ]);
    }

    public function store(StoreSongRequest $request)
    {
        $data = $request->validated();
        $image = $request->song_image;
        if($image) {
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('songs'), $imageName);
            $data['song_image'] = 'songs/'.$imageName;
        }
        $mp3 = $request->song_file;
        if($mp3) {
            $mp3Name = time().'.'.$mp3->getClientOriginalExtension();
            $mp3->move(public_path('songs'), $mp3Name);
            $data['song_file'] = 'songs/'.$mp3Name;
        }
        $song = Song::create($data);
//        dd($request->singer_id);
        foreach ($request->singer_id as $singer_id)
        {
            SingerSong::create([
                "singer_id" => $singer_id,
                "song_id" => $song->id
            ]);
        }

        return redirect()->route('admin.songs.index');
    }

    public function edit(Song $song)
    {
        $genres = Genre::all();
        $singers = Singer::all();
        return view("admin.songs.edit", [
            "data" => $song,
            "genres" => $genres,
            "singers" => $singers
        ]);
    }

    public function update(UpdateSongRequest $request, Song $song)
    {
        $data = $request->validated();
        $image = $request->song_image;
        if($image) {
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('songs'), $imageName);
            $data['song_image'] = 'songs/'.$imageName;
        }
        $mp3 = $request->song_file;
        if($mp3) {
            $mp3Name = time().'.'.$mp3->getClientOriginalExtension();
            $mp3->move(public_path('songs'), $mp3Name);
            $data['song_file'] = 'songs/'.$mp3Name;
        }
        Song::where('id', $song->id)->update($data);
        return redirect()->route('admin.songs.index');
    }

    public function destroy(Song $song)
    {
        $song->delete();

        return redirect()->route('admin.songs.index');
    }
}
