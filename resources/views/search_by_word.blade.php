@extends('main')
@section('content')
    <div class="sort-items">
        <div class="for-sort-items" id="search-by-tag">
            <div class="sort-tags">Results for:</div>
            <div>
                <span class="badge badge-warning" id="find-name">{{ $q }}</span>
            </div>
        </div>
    </div>
    @if (count($books) == 0)
        <div class="alert alert-warning">
            No results for <strong>{{ $q }}</strong>.<br/>
            Try checking your spelling or use more general terms.
        </div>
    @endif
    @foreach($books as $book)
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
                @php
                    $date = explode(' ',  $book['book_date']);
                @endphp
                <p>
                    <b>Date</b>: {{ $date[0] }}
                </p>
                <p>
                    <b>Tags</b>:
                    @foreach ($book['find_tags'] as $find_tags)
                        <span class="badge badge-pill badge-success">{{ $find_tags['tag'] }}</span>
                    @endforeach
                </p>
                <a href="{{ route('books_by_id', ['id' => $book['id']]) }}" class="btn btn-primary">Details</a>
            </div>
        </div>
    @endforeach
@endsection