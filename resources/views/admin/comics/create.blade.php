
@extends('layouts.app')
@section('title', "Admin - create new comic")
@section('header')
{{-- insert header --}}
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
