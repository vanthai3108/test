@extends('layouts.admin-app')

@section('content')
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-12 text-center">
                <h4>List of genres</h4>
                <a href="{{route('admin.genres.create')}}">Add new</a>
                <table class="table table-striped mt-3">
                <tr>
                    <th>Genre name</th>
                    <th>Action</th>
                </tr>
                    @foreach($data as $item)
                        <tr>
                            <td class="align-middle"><a href="{{route('admin.genres.edit', $item->id)}}">{{$item->genre_name}}</a></td>
                            <td class="align-middle">
                                <div class="d-flex justify-content-center accordion-header h-100">
                                    <a href="{{route('admin.genres.edit', $item->id)}}" class="mr-3" style="margin-top: 2px"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
                                    <form action="{{route('admin.genres.destroy', $item->id)}}" method="POST">
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
