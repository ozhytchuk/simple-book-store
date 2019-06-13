<h2>Add book</h2>
<div class="container">
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input id="title" type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input id="author" type="text" class="form-control" name="author">
        </div>
        <div class="form-group">
            <label for="Description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="2"></textarea>
        </div>
        <div class="form-group">
            <label for="poster">Poster</label>
            <input id="poster" type="text" class="form-control" name="poster"
                   placeholder="https://lorempixel.com/640/480/?55422">
        </div>
        <div class="form-group">
            <label for="url">URL</label>
            <input id="url" type="text" class="form-control" name="url" placeholder="http://bradtke.com/">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input id="price" type="text" class="form-control" name="price">
        </div>

        <button class="btn btn-success" style="cursor: pointer; float: right; margin-bottom: 2%;">
            Save
        </button>
    </form>
</div>