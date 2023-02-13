
@extends('layouts.app')

@section('main')
<section id="cards">
    <div class="">
        
        <div class="row w-100">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Thumb</th>
                        <th scope="col">Price</th>
                        <th scope="col">Serie</th>
                        <th scope="col">Sale date</th>
                        <th scope="col">Type</th>
                        <th scope="col">Creation date</th>
                        <th scope="col">Update date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comics as $item)
                            <tr>
                                <th scope="row"> {{$item->id}} </th>
                                <td> {{$item->title}} </td>
                                <td class="text-truncate" style="max-width: 300px;"> {{$item->description}} </td>
                                <td class="text-truncate" style="max-width: 300px;"> {{$item->thumb}} </td>
                                <td> {{$item->price}} </td>
                                <td> {{$item->series}} </td>
                                <td> {{$item->sale_date}} </td>
                                <td> {{$item->type}} </td>
                                <td> {{$item->created_at}} </td>
                                <td> {{$item->updated_at}} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>
@endsection
