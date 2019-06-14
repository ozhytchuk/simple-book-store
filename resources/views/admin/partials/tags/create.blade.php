<h2>Add tag</h2>
<div class="container">
    <form action="{{ route('tags.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="tag">Tag name</label>
            <input id="tag" type="text" class="form-control" name="tag">
        </div>

        <button class="btn btn-success" style="cursor: pointer; float: right; margin-bottom: 2%;">
            Save
        </button>
    </form>
</div>