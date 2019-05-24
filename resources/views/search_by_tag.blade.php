@extends('main')
@section('content')
    @if (count($books) == 0)
        <div class="alert alert-warning">
            <strong>SORRY,</strong> we couldn't find this page.
        </div>
    @else
        <div class="sort-items">
            <div class="for-sort-items" id="search-by-tag">
                <div class="sort-tags">Search by tag:</div>
                    <div>
                        <span class="badge badge-warning" id="find-name"><?= $books[0]['tag'] ?></span>
                    </div>
            </div>
        </div>
    @endif
    @foreach($books as $find_tag)
        @foreach ($find_tag['find_tags'] as $book)
            <div class="book-item">
                <div class="poster">
                    <a href="{{ route('books_by_id', ['id' => $book['id']]) }}">
                        <img src="{{ $book['poster'] }}" alt="{{ $book['title'] }}" class="media-object">
                    </a>
                </div>
                <div>
                    <h4 class="book-title">
                        <a href="{{ route('books_by_id', ['id' => $book['id']]) }}">{{ $book['title'] }}</a>
                    </h4>
                    <p>
                        <b>Author</b>: {{ $book['author'] }}
                    </p>
                    <p>
                        <b>Price</b>: <span style="color: #3c763d;">{{ $book['price'] }} $</span>
                    </p>
                    <p>
                        <b>Date</b>: {{ $book['book_date'] }}
                    </p>
                    <p>
                        <b>Tags</b>:
                        <span class="badge badge-pill badge-success">{{ $find_tag['tag'] }}</span>
                    </p>
                    <a href="{{ route('books_by_id', ['id' => $book['id']]) }}" class="btn btn-primary">Details</a>
                </div>
            </div>
        @endforeach
    @endforeach
@endsection