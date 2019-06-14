@forelse($books as $book)
    <h2>Edit information</h2>
    <div class="container">
        <form action="{{ route('books.update', ['book' => $book->id]) }}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input id="title" type="text" class="form-control" name="title" value="{{ $book->title }}">
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input id="author" type="text" class="form-control" name="author" value="{{ $book->author }}">
            </div>
            <div class="form-group">
                <label for="Description">Description</label>
                <textarea class="form-control" id="description" name="description"
                          rows="2">{!! $book->description !!}</textarea>
            </div>
            <div class="form-group">
                <label for="poster">Poster</label>
                <input id="poster" type="text" class="form-control" name="poster"
                       placeholder="https://lorempixel.com/640/480/?55422" value="{{ $book->poster }}">
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <input id="url" type="text" class="form-control" name="url" placeholder="http://bradtke.com/"
                       value="{{ $book->url }}">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input id="price" type="text" class="form-control" name="price" value="{{ $book->price }}">
            </div>
            <div class="form-group">
                <label for="book_date">Date</label>
                <input id="book_date" type="text" class="form-control" name="book_date" value="{{ $book->book_date }}"
                >
            </div>
            <div class="form-group">
                <label for="test">Date</label>
                <select class="form-control" name="test">
                    <option>Default select</option>
                    <option>Default select</option>
                    <option>Default select</option>
                    <option>Default select</option>
                </select>
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