@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10 mb-5" style="height: 500px;">
            <div class="card h-100">
                <div id="carouselExampleControls" class="carousel slide h-100" data-ride="carousel">
                    <div class="carousel-inner h-100">
                        <div class="carousel-item active h-100">
                            <img class="d-block w-100 h-100" src="https://daily.jstor.org/wp-content/uploads/2023/01/good_times_with_bad_music_1050x700.jpg" alt="First slide"/>
                        </div>
                        <div class="carousel-item h-100">
                            <img class="d-block w-100 h-100" src="https://www.7pace.com/wp-content/uploads/2020/08/COVER-Music.png" alt="Third slide">
                        </div>
                        <div class="carousel-item h-100">
                            <img class="d-block w-100 h-100" src="https://live-production.wcms.abc-cdn.net.au/703bea0b95b10e68be415f5c613a7cac?impolicy=wcms_watermark_abc&cropH=1688&cropW=3000&xPos=0&yPos=0&width=862&height=485" alt="Second slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12 d-flex justify-content-between">
            <div class="card mb-3" style="width: 30%">
                <div class="card-header text-white text-center bg-warning">Top 10 Views</div>
                <div class="card-body">
                    @foreach($top10Views as $key => $song)
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex justify-content-center flex-column" style="width: 20px;">
                            <span>{{$key+1}}</span>
                        </div>
                        <div>
                            <img src="{{asset("$song->song_image")}}" style="height: 50px;width: 50px";/>
                        </div>
                        <div class="d-flex justify-content-center flex-column">
                            <a href="{{route('songs.show', ['song' => $song->id])}}" style="color: black; text-decoration: none; width:200px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis">{{ $song->song_name }}</a>
                            <span>{{ $song->song_views }} views</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="card mb-3" style="width: 30%">
                <div class="card-header text-white text-center bg-info">Top 10 Likes</div>
                <div class="card-body">
                    @foreach($top10Likes as $key => $song)
                        <div class="d-flex justify-content-between mb-3">
                            <div class="d-flex justify-content-center flex-column" style="width: 20px;">
                                <span>{{$key+1}}</span>
                            </div>
                            <div>
                                <img src="{{asset("$song->song_image")}}" style="height: 50px;width: 50px";/>
                            </div>
                            <div class="d-flex justify-content-center flex-column">
                                <a href="{{route('songs.show', ['song' => $song->id])}}" style="color: black; text-decoration: none; width:200px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis">{{ $song->song_name }}</a>
                                <span>{{ $song->song_likes }} likes</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card mb-3" style="width: 30%">
                <div class="card-header text-white text-center bg-secondary">Top 10 News </div>
                <div class="card-body">
                    @foreach($top10News as $key => $song)
                        <div class="d-flex justify-content-between mb-3">
                            <div class="d-flex justify-content-center flex-column" style="width: 20px;">
                                <span>{{$key+1}}</span>
                            </div>
                            <div>
                                <img src="{{asset("$song->song_image")}}" style="height: 50px;width: 50px";/>
                            </div>
                            <div class="d-flex justify-content-center flex-column">
                                <a href="{{route('songs.show', ['song' => $song->id])}}" style="color: black; text-decoration: none; width:200px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis">{{ $song->song_name }}</a>
                                <span>Release date: {{ $song->created_at->format('d/m/Y')}}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
