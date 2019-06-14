<div class="sort-items">
    <div class="for-sort-items" id="search-by-tag">
        <div class="sort-tags">Results for:</div>
        <div>
            <span class="badge badge-warning" id="find-name">{{ $q }}</span>
        </div>
    </div>
</div>
@forelse($books as $book)
    <div class="book-item">
        <div class="poster">
            <a href="{{ route('books.by_id', $book) }}">
                <img src="{{ $book->poster }}" alt="{{ $book->title }}" class="media-object">
            </a>
        </div>
        <div>
            <h4 class="book-title">
                <a href="{{ route('books.by_id', $book) }}">
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
            <a href="{{ route('books.by_id', $book) }}" class="btn btn-primary">Details</a>
        </div>
    </div>
@empty
    <div class="alert alert-warning">
        No results for <strong>{{ $q }}</strong>
    </div>
@endforelse
<div class="pag">
    <div class="pagination-page">
        {{ $books->links() }}
    </div>
</div>