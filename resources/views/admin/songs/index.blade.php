@extends('layouts.admin-app')

@section('content')
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-12 text-center">
                <h4>List of songs</h4>
                <a href="{{route('admin.songs.create')}}">Add new</a>
                <table class="table table-striped mt-3">
                <tr>
                    <th>Song name</th>
                    <th>Genre</th>
                    <th>Song image</th>
                    <th>Song prices</th>
                    <th>Song views</th>
                    <th>Song likes</th>
                    <th>Action</th>
                </tr>
                    @foreach($data as $item)
                        <tr>
                            <td class="align-middle"><a href="{{route('admin.songs.edit', $item->id)}}">{{$item->song_name}}</a></td>
                            <td class="align-middle">{{$item->genre->genre_name}}</td>
                            <td class="align-middle"><img src="{{ $item->song_image ? asset("$item->song_image") : asset("uploads/avatar.webp")}}" style="height: 40px; width: 40px" class="rounded-circle"></td>
                            <td class="align-middle">{{$item->song_prices}}$</td>
                            <td class="align-middle">{{$item->song_views}}</td>
                            <td class="align-middle">{{$item->song_likes}}</td>
                            <td class="align-middle">
                                <div class="d-flex justify-content-center accordion-header h-100">
                                    <a href="{{route('admin.songs.edit', $item->id)}}" class="mr-3" style="margin-top: 2px"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
                                    <form action="{{route('admin.songs.destroy', $item->id)}}" method="POST">
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
                    {!! $data->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
