@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-10">
            <h4 class="text-center">Cart</h4>
            @if(count($songs))
            <div>
                @foreach($songs as $song)
                    <div class="col-12">
                        <div class="card mb-3" style="width: 100%">
                            <div class="card-body d-flex justify-content-between">
                                <div class="d-flex justify-content-center">
                                    <img src="{{asset("$song->song_image")}}" style="height: 50px;width: 50px";/>
                                </div>
                                <div class="d-flex justify-content-center col-5 flex-column">
                                    <div>
                                        Song: <a href="{{route('songs.show', $song->id) }}" style="color: black; text-decoration: none; width:200px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis">{{ $song->song_name }}</a>
                                    </div>
                                    Singer:@if(!count($song->singers)) Updating @endif
                                    @foreach($song->singers as $singer) {{ $singer->singer_name }}, @endforeach
                                </div>
                                <div class="col-2"></div>
                                <div class="d-flex justify-content-center col-2 flex-column">
                                    <span>{{ $song->song_prices }}$</span>
                                </div>
                                <div class="d-flex justify-content-center col-2 flex-column">
                                    <a href="{{route('cart.delete', ['song' => $song->id])}}"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @php($total = $songs->sum('song_prices'))
            <div class="text-center p-3">Total: {{$total}}</div>
            <form action="{{route('cart.pay')}}" method="get">
                <div class="text-center">
                    <select name="payment_bank">
                        <option value="MB Bank">MB Bank</option>
                        <option value="Vietcombank">Vietcombank</option>
                        <option value="Vietinbank">Vietinbank</option>
                        <option value="BIDV">BIDV</option>
                        <option value="Agribank">Agribank</option>
                        <option value="Techcombank">Techcombank</option>
                        <option value="VPBank">VPBank</option>
                        <option value="Sacombank">Sacombank</option>
                        <option value="DongA Bank">DongA Bank</option>
                        <option value="ACB">ACB</option>
                        <option value="HDBank">HDBank</option>
                        <option value="TPBank">TPBank</option>
                        <option value="OceanBank">OceanBank</option>
                        <option value="Eximbank">Eximbank</option>
                        <option value="MSB">MSB</option>
                        <option value="SHB">SHB</option>
                        <option value="VIB">VIB</option>
                        <option value="PG Bank">PG Bank</option>
                    </select>
                </div>
                <div class="text-center p-3">
                    <button class="btn btn-primary">Buy now</button>
                </div>
            </form>
            @else
                <div class="text-center p-3">Your cart is empty</div>
            @endif
        </div>
    </div>
</div>
@endsection
