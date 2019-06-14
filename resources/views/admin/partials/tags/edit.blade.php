@forelse($tags as $tag)
    <h2>Edit information</h2>
    <div class="container">
        <form action="{{ route('tags.update', ['tag' => $tag->id]) }}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="tag">Title</label>
                <input id="tag" type="text" class="form-control" name="tag" value="{{ $tag->tag }}">
            </div>
            <button class="btn btn-success" style="cursor: pointer; float: right; margin-bottom: 2%;">
                Edit
            </button>
        </form>
    </div>
@empty
    <div class="alert alert-warning">
        No results.
    </div>
@endforelse