@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-10">
            <h4 class="text-center">List bought</h4>
            @if(count($songs))
            <div>
                @foreach($songs as $song)
                    <div class="col-12">
                        <div class="card mb-3" style="width: 100%">
                            <div class="card-body d-flex justify-content-between">
                                <div class="d-flex justify-content-center">
                                    <img src="{{asset("$song->song_image")}}" style="height: 50px;width: 50px";/>
                                </div>
                                <div class="d-flex justify-content-center col-4 flex-column">
                                    <div>
                                        Song: <a href="{{route('songs.show', $song->id) }}" style="color: black; text-decoration: none; width:200px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis">{{ $song->song_name }}</a>
                                    </div>
                                    Singer:@if(!count($song->singers)) Updating @endif
                                    @foreach($song->singers as $singer) {{ $singer->singer_name }}, @endforeach
                                </div>
                                <div class="d-flex justify-content-center col-3 flex-column">
                                    <span>Buy date: @foreach($song->payments as $payment) {{$payment->payment_date}} @endforeach</span>
                                </div>
                                <div class="d-flex justify-content-center col-2 flex-column">
                                    <span>Bank: @foreach($song->payments as $payment) {{$payment->payment_bank}} @endforeach</span>
                                </div>
                                <div class="d-flex justify-content-center col-2 flex-column">
                                    <a href="{{$song->song_file}}" download="{{$song->song_file}}">Download</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {!! $songs->links() !!}
            </div>
            @else
                <div class="text-center">
                    <span>No Songs</span>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
