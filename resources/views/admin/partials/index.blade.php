<h2>Books</h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Poster</th>
            <th>Price</th>
            <th>Tags</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td><a href="{{ route('admin.show', ['book' => $book->id]) }}">{{ $book->title }}</a></td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->poster }}</td>
                <td>{{ $book->price }}</td>
                @foreach ($book->findTags as $findTag)
                    <td>{{ $findTag->tag }}</td>
                @endforeach
                <td>
                    <a href="{{ route('admin.edit', ['book' => $book->id]) }}"><i
                                class="fas fa-edit"></i>
                    </a>


        @endforeach

        </tbody>
    </table>
    <div class="new-book">
        <a href="{{ route('admin.create') }}" class="btn btn-success" style="float: right">Add new book</a>
    </div>
    <br/>
    <div class="pag">
        <div class="pagination-page">
            {{ $books->links() }}
        </div>
    </div>
</div>