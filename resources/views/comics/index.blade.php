
<section id="cards">
    <div class="container">
        
        <div class="row">
            @foreach ($comics as $comic)
            <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                <div class="card-group">
                    <div class="card">
                        <img src="{{ $comic['thumb']}}" class="card-img-top" alt="{{$comic['title']}}">
                        <div class="card-body">
                            <h6 class="card-title"> {{$comic['title']}} </h6>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</section>
    