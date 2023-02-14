
@extends('layouts.app')
@section('title', "Admin - create new comic")


@section('main')
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <form action="{{route('admin.comics.store')}}" method="POST">
            @csrf
                <div class="mb-4">
                    <label for="title" class="form-label">Title</label>
                    <input name="title" type="text" class="form-control" id="title" placeholder="Title">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" placeholder="Description" class="form-control" id="description" rows="3"></textarea>
                </div>
                <div class="mb-4">
                    <label for="thumb" class="form-label">Link</label>
                    <input name="thumb" type="text" class="form-control" id="thumb" placeholder="Link">
                </div>
                <div class="mb-4">
                    <label for="price" class="form-label">Price</label>
                    <input name="price" type="text" class="form-control" id="price" placeholder="Price">
                </div>
                <div class="mb-4">
                    <label for="series" class="form-label">Serie</label>
                    <input name="series" type="text" class="form-control" id="series" placeholder="Serie">
                </div>
                <div class="mb-4">
                    <label for="sale_date" class="form-label">Sale date</label>
                    <input name="sale_date" type="text" class="form-control" id="sale_date" placeholder="Sale date">
                </div>
                <div class="mb-4">
                    <label for="type" class="form-label">Type</label>
                    <input name="type" type="text" class="form-control" id="type" placeholder="Type">
                </div>
                <button type="submit" class="btn btn-success mb-4">Add</button>
            </form>
            
        </div>
    </div>

</div>

@endsection
