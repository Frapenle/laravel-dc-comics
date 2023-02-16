
@extends('layouts.app')
@section('title', "Admin - create new comic")
@section('header')
{{-- insert header --}}
@endsection
@section('main')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="col-12">
            @include('admin.comics.partials.form', ['route' => 'admin.comics.update', 'method' => 'PUT', 'comic' => $comic])
        </div>
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
