@forelse($tags->findTags as $book)
    <div class="book-item">
        <div class="poster">
            <a href="{{ route('books.show', ['book' => $book->id]) }}">
                <img src="{{ $book->poster }}" alt="{{ $book->title }}" class="media-object">
            </a>
        </div>
        <div>
            <h4 class="book-title">
                <a href="{{ route('books.show', ['book' => $book->id]) }}">
                    {{ $book->title }}
                </a>
            </h4>
            <p>
                <b>Author</b>: {{ $book->author }}
            </p>
            <p>
                <b>Price</b>: <span style="color: #3c763d;">{{ $book->price }} $</span>
            </p>
            @php
                $date = explode(' ', $book->book_date);
            @endphp
            <p>
                <b>Date</b>: {{ $date[0] }}
            </p>
            <p>
                <b>Tags</b>:
                @foreach ($book->findTags as $findTag)
                    <span class="badge badge-pill badge-success">{{ $findTag->tag }}</span>
                @endforeach
            </p>
            <a href="{{ route('books.show', ['book' => $book->id]) }}" class="btn btn-primary">Details</a>
        </div>
    </div>
@empty
    <div class="alert alert-warning">
        No results.
    </div>
@endforelse