@extends('layouts.admin-app')

@section('content')
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-12 text-center d-flex justify-content-center">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            Add songs
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.songs.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12 mb-3">
                                    <input id="song_name" type="text" class="form-control @error('song_name') is-invalid @enderror" name="song_name" value="{{ old('song_name') }}" required autocomplete="song_name" placeholder="Song name" autofocus>

                                    @error('song_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3 text-start">
                                    <label>Song image:</label>
                                    <input id="song_image" type="file" class="form-control @error('song_image') is-invalid @enderror" name="song_image" value="{{ old('song_image') }}">

                                    @error('song_image')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3 text-start">
                                    <label>Song file:</label>
                                    <input id="song_file" type="file" class="form-control @error('song_file') is-invalid @enderror" name="song_file" value="{{ old('song_file') }}">

                                    @error('song_file')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <input id="song_prices" type="number" step="1" min="0" value="0" class="form-control @error('song_prices') is-invalid @enderror" name="song_prices" value="{{ old('song_prices') }}" required autocomplete="song_prices" placeholder="Song price" autofocus>

                                    @error('song_prices')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3 text-start">
                                    <select name="genre_id" id="genre_id" class="form-control @error('genre_id') is-invalid @enderror">
                                        <option value="">Select genre</option>
                                        @foreach($genres as $genre)
                                            <option value="{{$genre->id}}" @if(old('genre_id') == $genre->id) selected @endif>{{$genre->genre_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('genre_id')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3 text-start">
                                    <label>Select singers:</label>
                                    <select name="singer_id[]" id="singer_id" class="form-control @error('singer_id') is-invalid @enderror" multiple>
                                        @foreach($singers as $singer)
                                            <option value="{{$singer->id}}" @if(old('singer_id') && in_array($singer->id, old('singer_id'))) selected @endif
                                            >{{$singer->singer_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('singer_id')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3 text-start">
                                    <textarea name="song_lyrics" placeholder="Song lyrics" id="song_lyrics" class="form-control @error('song_lyrics') is-invalid @enderror" cols="30" rows="10" >{{old('song_lyrics')}}</textarea>
                                    @error('song_lyrics')
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
