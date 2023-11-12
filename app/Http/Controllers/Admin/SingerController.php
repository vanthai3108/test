<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSingerRequest;
use App\Http\Requests\UpdateSingerRequest;
use App\Models\Singer;

class SingerController extends Controller
{
    public function index()
    {
        $data = Singer::paginate(10);

        return view("admin.singers.index", [
            "data" => $data
        ]);
    }

    public function create()
    {
        return view("admin.singers.create");
    }

    public function store(StoreSingerRequest $request)
    {
        $data = $request->validated();
        $image = $request->singer_image;
        if($image) {
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('singers'), $imageName);
            $data['singer_image'] = 'singers/'.$imageName;
        }
        Singer::create($data);

        return redirect()->route('admin.singers.index');
    }

    public function edit(Singer $singer)
    {
        return view("admin.singers.edit", [
            "data" => $singer
        ]);
    }

    public function update(UpdateSingerRequest $request, Singer $singer)
    {
        $data = $request->validated();
        $image = $request->singer_image;
        if($image) {
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('singers'), $imageName);
            $data['singer_image'] = 'singers/'.$imageName;
        }
        Singer::where('id', $singer->id)->update($data);
        return redirect()->route('admin.singers.index');
    }

    public function destroy(Singer $singer)
    {
        $singer->delete();

        return redirect()->route('admin.singers.index');
    }
}
