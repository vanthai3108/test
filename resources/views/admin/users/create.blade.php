@extends('layouts.admin-app')

@section('content')
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-12 text-center d-flex justify-content-center">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            Add users
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12 mb-3">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Username" autofocus>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" placeholder="Password" autofocus>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" required autocomplete="full_name" placeholder="Full name" autofocus>

                                    @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <input id="phone_number" type="tel" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" placeholder="Phone number" autofocus>

                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3 text-start">
                                    <label>Avatar:</label>
                                    <input id="avatar_image" type="file" class="form-control @error('avatar_image') is-invalid @enderror" name="avatar_image" value="{{ old('avatar_image') }}">

                                    @error('avatar_image')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row mb-3 px-3">
                                    <label for="name" class="col-md-4 col-form-label text-start">Vip or normal</label>

                                    <div class="col-md-6 d-flex justify-content-between @error('check_vip') is-invalid @enderror">
                                        <div class="mt-2">
                                            <input class="form-check-input @error('check_vip') is-invalid @enderror" value="1" type="radio" name="check_vip" id="check_vip1">
                                            <label class="form-check-label" for="check_vip1">
                                                VIP
                                            </label>
                                        </div>
                                        <div class="mt-2">
                                            <input class="form-check-input @error('check_vip') is-invalid @enderror" value="0" type="radio" name="check_vip" id="check_vip2" checked>
                                            <label class="form-check-label" for="check_vip2">
                                                Normal
                                            </label>
                                        </div>
                                    </div>
                                    @error('check_vip')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row mb-3 px-3">
                                    <label for="name" class="col-md-4 col-form-label text-start">Admin or User</label>

                                    <div class="col-md-6 d-flex justify-content-between @error('permission') is-invalid @enderror">
                                        <div class="mt-2">
                                            <input class="form-check-input @error('permission') is-invalid @enderror" value="1" type="radio" name="permission" id="permission1">
                                            <label class="form-check-label" for="permission1">
                                                Admin
                                            </label>
                                        </div>
                                        <div class="mt-2">
                                            <input class="form-check-input @error('permission') is-invalid @enderror" value="0" type="radio" name="permission" id="permission2" checked>
                                            <label class="form-check-label" for="permission2">
                                                User
                                            </label>
                                        </div>
                                    </div>
                                    @error('permission')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn col-12 btn-primary">
                                        Add
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
