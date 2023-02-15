@extends('layouts.appGuest')

@section('main')
<section id="guests">
    <div class="container-fluid">
        <div class="row w-100 mt-1">
            <div class="col-12">
                <div class="title py-2">

                    <h3><a href="#">Register</a> to full access</h3>
                </div>
            </div>
            <div class="col-12">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($comics as $comic)
                            <tr>
                                <th scope="row"> {{$comic->id}} </th>
                                <td> {{$comic->title}} </td>
                                <td> {{$comic->price}} </td>
                                <td> {{$comic->type}} </td>
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
