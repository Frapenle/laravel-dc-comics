
@extends('layouts.app')
@section('title', "Admin - create new comic")
@section('header')
{{-- insert header --}}
<div class="container">
        <div class="row w-100 d-flex">
            <div class="col-12">
                <div class="controllers w-100 d-flex">
                    <a href="{{route('admin.comics.create')}}" class="h-50 btn btn-outline-success fw-bold sticky-top">Nuovo comic</a>
                    <a href="{{route('admin.comics.index')}}" class="h-50 btn btn-outline-primary fw-bold sticky-top">Home</a>
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
<div id="form-create" class="container mt-5">
    <div class="row">
        <div class="col-12">
            @include('admin.comics.partials.form', ['route' => 'admin.comics.store', 'method' => 'POST', 'comic' => $comic])
        </div>
    </div>

</div>

@endsection
