@extends('main')
@section('content')
    @php
        $num_pages = ceil($countBooks / 5);
    @endphp
    <div class="sort-items">
        <div class="for-sort-items">
            <div class="sort-tags">Sort by:</div>
            <div>
                <a href="{{ route('sort_by', ['param' => 'title']) }}"
                   class="badge badge-dark"
                   id="find-name">Name
                </a>
                <a href="{{ route('sort_by', ['param' => 'price']) }}"
                   class="badge badge-dark"
                   id="find-price">Price
                </a>
                <a href="{{ route('sort_by', ['param' => 'book_date']) }}"
                   class="badge badge-dark"
                   id="find-price">Date
                </a>
            </div>
        </div>
        <div class="for-all-tags">
            <div class="sort-tags">Select a tag:</div>
            <div>
                @foreach($allTags as $tags)
                    <a href="{{ route('tags', ['tag_id' => $tags->id]) }}" class="badge badge-info"
                       id="find-tag">{{ $tags->tag }}</a>
                @endforeach
            </div>
        </div>
    </div>
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
                    $date = explode(' ', $book['book_date']);
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
    <div class="pag">
        <div class="pagination-page">
            <?php for ($page = 1; $page <= $num_pages; $page++) : ?>
            <a class="page-link" href='?page=<?= $page ?>'><?= $page ?></a>
            <?php endfor; ?>
        </div>
    </div>
@endsection