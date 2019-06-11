@extends('main')
@section('content')
    @forelse($books as $book)
        <div class="sort-items">
            <div class="for-sort-items" id="search-by-tag">
                <div class="sort-tags">Search by tag:</div>
                <div>
                    <span class="badge badge-warning" id="find-name">{{ $book->tag }}</span>
                </div>
            </div>
        </div>
        @forelse($book->findTags as $findTags)
            <div class="book-item">
                <div class="poster">
                    <a href="{{ route('books_by_id', ['id' => $findTags->id]) }}">
                        <img src="{{ $findTags->poster }}" alt="{{ $findTags->title }}" class="media-object">
                    </a>
                </div>
                <div>
                    <h4 class="book-title">
                        <a href="{{ route('books_by_id', ['id' => $findTags->id]) }}">{{ $findTags->title }}</a>
                    </h4>
                    <p>
                        <b>Author</b>: {{ $findTags->author }}
                    </p>
                    <p>
                        <b>Price</b>: <span style="color: #3c763d;">{{ $findTags->price }} $</span>
                    </p>
                    <p>
                        <b>Date</b>: {{ $findTags->book_date }}
                    </p>
                    <p>
                        <b>Tags</b>:
                        <span class="badge badge-pill badge-success">{{ $book->tag }}</span>
                    </p>
                    <a href="{{ route('books_by_id', ['id' => $findTags->id]) }}" class="btn btn-primary">Details</a>
                </div>
            </div>

        @empty
            <div class="alert alert-warning">
                No results.
            </div>
        @endforelse
    @empty
        <div class="alert alert-warning">
            <strong>SORRY,</strong> we couldn't find this page.
        </div>
    @endforelse
@endsection