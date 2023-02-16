<form action="{{route($route, $comic->id)}}" method="POST" class="mb-3">
@csrf
@method($method)
{{-- ===== display errors ===== --}}
    @if ($errors->any())
        
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>
                {{$error}}
            </li>
        @endforeach
        </ul>
    </div>
    @endif
    <div class="mb-4">
        <label for="title" class="form-label">Title</label>
        <input name="title" type="text" class="form-control" id="title" value={{ old('title') ?? $comic->title }}>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" value="Description" class="form-control" id="description" rows="3">{{ old('title') ?? $comic->description }}</textarea>
    </div>
    <div class="mb-4">
        <label for="thumb" class="form-label">Link</label>
        <input name="thumb" type="text" class="form-control" id="thumb" value={{ old('title') ?? $comic->thumb }}>
    </div>
    <div class="mb-4">
        <label for="price" class="form-label">Price</label>
        <input name="price" type="text" class="form-control" id="price" value={{ old('title') ?? $comic->price }}>
    </div>
    <div class="mb-4">
        <label for="series" class="form-label">Serie</label>
        <input name="series" type="text" class="form-control" id="series" value={{ old('title') ?? $comic->series }}>
    </div>
    <div class="mb-4">
        <label for="sale_date" class="form-label">Sale date</label>
        <input name="sale_date" type="text" class="form-control" id="sale_date" value={{ old('title') ?? $comic->sale_date }}>
    </div>
    <div class="mb-4">
        <label for="type" class="form-label">Type</label>
        <input name="type" type="text" class="form-control" id="type" value={{ old('title') ?? $comic->type }}>
    </div>
    <button type="submit" class="btn 
    @if ($method == 'DELETE') btn-danger
    @elseif ($method == 'PUT') btn-warning
    @else ($method == 'POST') btn-success @endif">
    {{ $method == 'DELETE' ? 'Elimina' : 'Aggiorna' }}
    </button>

</form>