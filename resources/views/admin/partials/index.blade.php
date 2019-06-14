<h2>Books</h2>
<div class="table-responsive">
    <table class="table table-striped" id="my-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Poster</th>
            <th>Price</th>
            <th>Tags</th>
            <th style="text-align: center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td><a href="{{ route('books.show', ['book' => $book->id]) }}">{{ $book->title }}</a></td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->poster }}</td>
                <td>{{ $book->price }}</td>
                @forelse ($book->findTags as $findTag)
                        <td>{{ $findTag->tag }}</td>
                    @empty
                    <td><a href="#" class="badge badge-warning">NO DATA</a></td>
                @endforelse
                <td class="text-center" style="display: flex;">
                    <a href="{{ route('books.edit', ['book' => $book->id]) }}" class="btn btn-primary">
                        Edit
                    </a>
                    <a href="#" class="btn btn-danger" id="edit-icon" onclick="var result = confirm('Are you sure?'); if (result) {
                        event.preventDefault();
                        document.getElementById('delete-form').submit();
                    }">
                        Delete
                    </a>
                    <form id="delete-form" action="{{ route('books.destroy', ['book' => $book->id]) }}" method="post"
                          style="display: none">
                        @csrf
                        @method('DELETE')

                    </form>
                </td>
        @endforeach

        </tbody>
    </table>
    <div class="new-book">
        <a href="{{ route('books.create') }}" class="btn btn-success" style="float: right">Add new book</a>
    </div>
    <div class="new-book">
        <a href="{{ route('site.index') }}" class="btn btn-outline-danger back-to-site">Back to site</a>
    </div>
    <br/>
    <div class="pag">
        <div class="pagination-page">
            {{ $books->links() }}
        </div>
    </div>
</div>