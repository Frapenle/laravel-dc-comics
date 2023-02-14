
@extends('layouts.app')

@section('main')
<section id="cards">
    <div class="">
        
        <div class="row w-100">
            <div class="col-12">
                <table class="table table-striped table-hover table-success">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        {{-- <th scope="col">Description</th> --}}
                        <th scope="col">Thumb</th>
                        <th scope="col">Price</th>
                        <th scope="col">Serie</th>
                        {{-- <th scope="col">Sale date</th> --}}
                        <th scope="col">Type</th>
                        {{-- <th scope="col">Creation date</th> --}}
                        {{-- <th scope="col">Update date</th> --}}
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($comics as $comic)
                            <tr>
                                <th scope="row"> {{$comic->id}} </th>
                                <td> {{$comic->title}} </td>
                                {{-- <td class="text-truncate" style="max-width: 300px;"> {{$comic->description}} </td> --}}
                                <td class="text-truncate" style="max-width: 300px;"> {{$comic->thumb}} </td>
                                <td> {{$comic->price}} </td>
                                <td style="max-width: 200px;"> {{$comic->series}} </td>
                                {{-- <td> {{$comic->sale_date}} </td> --}}
                                <td> {{$comic->type}} </td>
                                {{-- <td> {{$comic->created_at}} </td> --}}
                                {{-- <td> {{$comic->updated_at}} </td> --}}
                                <td style="width: 300px;">
                                    <button class="btn btn-success bttn-xs">Show</button>
                                    <button class="btn btn-warning bttn-xs">Edit</button>
                                    <button class="btn btn-danger bttn-xs">Delete</button>
                                </td>
                            </tr>
                        @empty
                        <table>
                            <tr>
                                <td id="empty" colspan="6"> Empty database </td>
                            </tr>
                        </table>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>
@endsection
