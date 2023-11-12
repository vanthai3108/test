@extends('layouts.admin-app')

@section('content')
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-12 text-center d-flex justify-content-center">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            Edit singer
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.singers.update', ['singer' => $data->id]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="col-md-12 mb-3">
                                    <input id="singer_name" type="text" class="form-control @error('singer_name') is-invalid @enderror" name="singer_name" value="{{ old('singer_name') ? old('singer_name') : $data->singer_name }}" required autocomplete="singer_name" placeholder="Singer name" autofocus>

                                    @error('singer_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3 text-start">
                                    <label>Singer image:</label>
                                    <input id="singer_image" type="file" class="form-control @error('singer_image') is-invalid @enderror" name="singer_image" value="{{ old('singer_image') }}">

                                    @error('singer_image')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <textarea name="singer_detail" placeholder="Singer detail" id="singer_detail" class="form-control @error('singer_detail') is-invalid @enderror" cols="30" rows="10">{{old('singer_detail') ? old('singer_detail') : $data->singer_detail}}</textarea>
                                    @error('singer_detail')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn col-12 btn-primary">
                                        Update
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
