@forelse($books as $book)
    <h2>{{ $book->title }}</h2>
    <div class="book-item">
        <div class="poster">
            <img src="{{ $book->poster }}" alt="" class="media-object">
            <div class="text-center" style="margin-top: 25px">
                <a href="{{ $book->url }}" target="_blank" class="btn btn-success" id="but" role="button"
                   aria-pressed="true">More information</a>
            </div>
        </div>
        <div>
            <h4 class="book-title title-color">{{ $book->title }}</h4>
            <p>
                <b>Author</b>: {{ $book->author }}
            </p>
            <p>
                <b>Price</b>: <span style="color: #3c763d;">{{ $book->price }} $</span>
            </p>
            <p>
                @php
                    $date = explode(' ', $book->book_date);
                @endphp
                <b>Date</b>: {{ $date[0] }}
            </p>
            <p>
                <b>Tags</b>:
                @foreach($book->findTags as $tag)
                    <span class="badge badge-pill badge-warning">{{ $tag->tag }}</span>
                @endforeach
            </p>
            <p>{!! $book->description !!}</p>
        </div>
    </div>
    <form action="{{ route('admin.destroy', ['book' => $book->id]) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
    </form>
@empty
    <div class="alert alert-warning">
        No results.
    </div>
@endforelse