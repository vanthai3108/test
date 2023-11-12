<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::paginate(10);

        return view("admin.users.index", [
            "users" => $users
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view("admin.users.create");
    }

    /**
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUserRequest $request)
    {
        $user = $request->validated();
        $user['password'] = Hash::make($user['password']);
        $image = $request->avatar_image;
        if($image) {
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $user['avatar_image'] = 'uploads/'.$imageName;
        }
        User::create($user);

        return redirect()->route('admin.users.index');
    }

    /**
     * @param User $user
     * @return void
     */
    public function show(User $user)
    {
        //
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        return view("admin.users.edit", [
            "user" => $user
        ]);
    }

    /**
     * @param UpdateUserRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $userUpdate = $request->validated();
        $userUpdate['password'] = Hash::make($request->password);
        $image = $request->avatar_image;
        if($image) {
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $userUpdate['avatar_image'] = 'uploads/'.$imageName;
        }
        User::where('id', $user->id)->update($userUpdate);
        return redirect()->route('admin.users.index');
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
