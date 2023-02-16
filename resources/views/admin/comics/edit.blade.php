@extends('layouts.app')
@section('title', "Admin - edit $comic->title")
@section('header')
{{-- insert header --}}
    <div class="container">
        <div class="row w-100 d-flex">
            <div class="col-12">
                <div class="controllers w-100 d-flex">
                    <a href="{{route('admin.comics.create')}}" class="h-50 btn btn-outline-success fw-bold sticky-top">Nuovo comic</a>
                    <a href="{{route('admin.comics.trashed')}}" class="h-50 btn btn-outline-secondary fw-bold sticky-top">Comic eliminati</a>
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
<div class="container mt-5">
    <div class="row">
            <div class="col-12">
                <div id="edit">
                    @include('admin.comics.partials.form', ['route' => 'admin.comics.update', 'method' => 'PUT', 'comic' => $comic])
                </div>
            </div>
    </div>
</div>
@endsection
