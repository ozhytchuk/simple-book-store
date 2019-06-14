<div class="sort-items">
    <div class="for-sort-items">
        <div class="sort-tags">Sort by:</div>
        <div>
            <a href="{{ route('books.sort', ['param' => 'title']) }}"
               class="badge badge-dark"
               id="find-name">Name
            </a>
            <a href="{{ route('books.sort', ['param' => 'price']) }}"
               class="badge badge-dark"
               id="find-price">Price
            </a>
            <a href="{{ route('books.sort', ['param' => 'book_date']) }}"
               class="badge badge-dark"
               id="find-price">Date
            </a>
        </div>
    </div>
</div>