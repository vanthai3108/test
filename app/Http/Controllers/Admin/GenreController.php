<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateGenreRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GenreController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = Genre::paginate(10);

        return view("admin.genres.index", [
            "data" => $data
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view("admin.genres.create");
    }

    /**
     * @param StoreGenreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreGenreRequest $request)
    {
        $data = $request->validated();
        Genre::create($data);

        return redirect()->route('admin.genres.index');
    }

    /**
     * @param Genre $genre
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Genre $genre)
    {
        return view("admin.genres.edit", [
            "data" => $genre
        ]);
    }

    /**
     * @param UpdateGenreRequest $request
     * @param Genre $genre
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        $data = $request->validated();
        Genre::where('id', $genre->id)->update($data);
        return redirect()->route('admin.genres.index');
    }

    /**
     * @param Genre $genre
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();

        return redirect()->route('admin.genres.index');
    }
}
