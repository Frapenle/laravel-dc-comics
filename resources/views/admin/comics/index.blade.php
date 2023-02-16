
@extends('layouts.app')
@section('title', "Admin - Comics list")

@section('header')
    <div class="container-fluid">
        <div class="row w-100 d-flex">
            <div class="col-12">
                <div class="controllers w-100 d-flex">
                    <a href="{{route('admin.comics.create')}}" class="h-50 btn btn-outline-success fw-bold sticky-top">Crea comic</a>
                    <a href="{{route('admin.comics.trashed')}}" class="h-50 btn btn-outline-secondary fw-bold sticky-top">Comic eliminati</a>
                    @if (session('message'))
                    <div class="message alert alert-danger text-center flex-grow-1">
                        <span>{{session('message')}}</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('main')
<section id="admin">
    <div class="container-fluid">
        <div class="row w-100 mt-5">
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
                        <th scope="col" class="text-center" style="width: 250px;">Action</th>
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
                                <td style="width: 250px;" class="text-end">
                                    <form action="{{route('admin.comics.destroy', $comic->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-success" href="{{route('admin.comics.show', $comic->id)}}">Show</a>
                                        <a class="btn btn-warning" href="{{route('admin.comics.edit', $comic->id)}}">Edit</a>
                                        <button type="submit" class="btn btn-danger" href="{{route('admin.comics.destroy', $comic->id)}}" onclick="return confirm('Attenzione, sei sicuro di voler eliminare questo record?')">Delete</button>
                                    </form>
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
