
@extends('layouts.app')

@section('main')
<section id="cards">
    <div class="">
        
        <div class="row w-100">
            <div class="col-12">
                
                <p scope="row"> {{$comic->id}} </p>
                <p> {{$comic->title}} </p>

                <button class="btn btn-success bttn-xs">Show</button>
                <button class="btn btn-warning bttn-xs">Edit</button>
                <button class="btn btn-danger bttn-xs">Delete</button>
            </div>
        </div>
    </div>

</section>
@endsection
