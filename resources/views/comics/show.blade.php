
@extends('layouts.app')


@section('main')
<section id="cards" class="m-4">
    <div class="">
        <div class="row w-100">
            <div class="col-12">
                <p> <span class="fw-bold">ID:</span> {{$comic->id}} </p>
                <p> <span class="fw-bold">Title:</span> {{$comic->title}} </p>
                <p> <span class="fw-bold">Description:</span> {{$comic->description}} </p>
                <p> <span class="fw-bold">Thumb:</span> {{$comic->thumb}} </p>
                <p> <span class="fw-bold">Price:</span> {{$comic->price}} </p>
                <p> <span class="fw-bold">Series:</span> {{$comic->series}} </p>
                <p> <span class="fw-bold">Sale date:</span> {{$comic->sale_date}} </p>
                <p> <span class="fw-bold">Type:</span> {{$comic->type}} </p>
                <a href="" class="btn btn-warning bttn-xs">Edit</a>
                <a href="" class="btn btn-danger bttn-xs">Delete</a>
            </div>
        </div>
    </div>

</section>
@endsection
