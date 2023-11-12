@extends('layouts.admin-app')

@section('content')
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-12 text-center d-flex justify-content-center">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            Add genres
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.genres.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12 mb-3">
                                    <input id="genre_name" type="text" class="form-control @error('genre_name') is-invalid @enderror" name="genre_name" value="{{ old('genre_name') }}" required autocomplete="username" placeholder="Genre name" autofocus>

                                    @error('genre_name')
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
