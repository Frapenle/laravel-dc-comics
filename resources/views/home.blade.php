@extends('layouts.app')

@section('main')
<section id="menu">
    <div class="container">
        <div class="row text-center mt-4">
            <div class="col-12">
                <h5 class="mb-5">Admin <a class="text-decoration-none" href="{{route('admin.comics.index')}}">comics</a></h5>
                <h5>Guest <a class="text-decoration-none" href="{{route('guest.home')}}">comics</a></h5>
            </div>
        </div>
    </div>

</section>
@endsection