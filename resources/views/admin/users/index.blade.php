@extends('layouts.admin-app')

@section('content')
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-12 text-center">
                <h4>List of users</h4>
                <a href="{{route('admin.users.create')}}">Add new</a>
                <table class="table table-striped mt-3">
                <tr>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Avatar</th>
                    <th>Vip</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                    @foreach($users as $user)
                        <tr>
                            <td class="align-middle"><a href="{{route('admin.users.edit', $user->id)}}">{{$user->username}}</a></td>
                            <td class="align-middle">{{$user->full_name}}</td>
                            <td class="align-middle"><img src="{{ $user->avatar_image ? asset("$user->avatar_image") : asset("uploads/avatar.webp")}}" style="height: 40px; width: 40px" class="rounded-circle"></td>
                            <td class="align-middle">@if($user->check_vip) Vip @else - @endif</td>
                            <td class="align-middle">@if($user->permission) Admin @else User @endif</td>
                            <td class="align-middle">
                                <div class="d-flex justify-content-center accordion-header h-100">
                                    <a href="{{route('admin.users.edit', $user->id)}}" class="mr-3" style="margin-top: 2px"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
                                    <form action="{{route('admin.users.destroy', $user->id)}}" method="POST">
                                        @method('DELETE')
                                        {{ csrf_field() }}
                                        <button class="btn p-0">
                                            <i class="fa fa-trash fa-lg" style="color: red" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </table>
                <div class="d-flex justify-content-center">
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
