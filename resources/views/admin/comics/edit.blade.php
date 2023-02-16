
@extends('layouts.app')
@section('title', "Admin - create new comic")


@section('main')
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <form action="{{route('admin.comics.update', $comic->id)}}" method="POST">
            @csrf
            @method('PUT')
                <div class="mb-4">
                    <label for="title" class="form-label">Title</label>
                    <input name="title" type="text" class="form-control" id="title" value={{ $comic->title}}>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" value="Description" class="form-control" id="description" rows="3">{{ $comic->description}}</textarea>
                </div>
                <div class="mb-4">
                    <label for="thumb" class="form-label">Link</label>
                    <input name="thumb" type="text" class="form-control" id="thumb" value={{ $comic->thumb}}>
                </div>
                <div class="mb-4">
                    <label for="price" class="form-label">Price</label>
                    <input name="price" type="text" class="form-control" id="price" value={{ $comic->price}}>
                </div>
                <div class="mb-4">
                    <label for="series" class="form-label">Serie</label>
                    <input name="series" type="text" class="form-control" id="series" value={{ $comic->series}}>
                </div>
                <div class="mb-4">
                    <label for="sale_date" class="form-label">Sale date</label>
                    <input name="sale_date" type="text" class="form-control" id="sale_date" value={{ $comic->sale_date}}>
                </div>
                <div class="mb-4">
                    <label for="type" class="form-label">Type</label>
                    <input name="type" type="text" class="form-control" id="type" value="{{ $comic->type}}">
                </div>
            </form>
            <form action="{{route('admin.comics.destroy', $comic->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <a class="btn btn-warning btn-sm" href="{{route('admin.comics.edit', $comic->id)}}">Edit</a>
                <button type="submit" class="btn btn-danger btn-sm" href="{{route('admin.comics.destroy', $comic->id)}}" onclick="return confirm('Attenzione, sei sicuro di voler eliminare questo record?')">Delete</button>
            </form>
            
        </div>
    </div>

</div>

@endsection
