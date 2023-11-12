@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-10 d-flex">
            <div class="col-4">
                <div class="card mb-3 " style="width: 100%; background-color: #f1f1f1">
                    <img src="{{asset("$song->song_image")}}" class="col-12 pt-3"/>
                    <audio class="col-12" controls
                           @if(!auth()->user()->check_vip && !$isBuy) controlsList="nodownload" @endif
                    >
                        <source src="{{asset("$song->song_file")}}" type="audio/mpeg" >
                    </audio>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="mr-5">
                        {{$song->song_views}} <i class="fa fa-eye fa-lg" aria-hidden="true"></i>
                    </div>
                    <div>
                        {{$song->song_likes}}
                        <a href="{{route('songs.like', $song->id)}}" style="color:#000;">
                            <i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                @if(!auth()->user()->check_vip && !$isBuy)
                    <div class="text-center mt-2">
                        <a class="btn col-8 btn-primary" href="{{route('cart.add', ['song' => $song->id])}}">Add to card</a>
                    </div>
                @endif


            </div>
            <div class="col-8">
                <h4>Song name: {{ $song->song_name }}</h4>
                <h5>Singer: <span>
                        @if(!count($song->singers)) Updating @endif
                        @foreach($song->singers as $singer) {{ $singer->singer_name }}, @endforeach</span>
                </h5>
                <h5>Genre: <span>{{$song->genre->genre_name}}</span></h5>
                <h5>Prices: <span>{{$song->song_prices}}$</span></h5>
                <h6>Lyrics:
                    <div class="col-12" style="white-space: pre-line">
                        {{$song->song_lyrics}}
                    </div>
                </h6>
            </div>

        </div>
    </div>
</div>
@endsection
