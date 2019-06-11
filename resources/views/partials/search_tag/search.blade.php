@foreach($books as $book)
    <div class="sort-items">
        <div class="for-sort-items" id="search-by-tag">
            <div class="sort-tags">Search by tag:</div>
            <div>
                <span class="badge badge-warning" id="find-name">{{ $book->tag }}</span>
            </div>
        </div>
    </div>
@endforeach