<h2>Tags</h2>
<div style="width: 50%; margin: auto;">
    <table class="table table-striped text-center">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tag name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <td>{{ $tag->id }}</td>
                <td><a href="{{ route('tags.show', ['tag' => $tag->id]) }}">{{ $tag->tag }}</a></td>
                <td class="text-center">
                    <a href="{{ route('tags.edit', ['tag' => $tag->id]) }}" class="btn btn-primary">
                        Edit
                    </a>
                    <a href="#" class="btn btn-danger" onclick="var result = confirm('Are you sure?'); if (result) {
                        event.preventDefault();
                        document.getElementById('delete-form').submit();
                    }">
                        Delete
                    </a>
                    <form id="delete-form" action="{{ route('tags.destroy', ['tag' => $tag->id]) }}" method="post"
                          style="display: none">
                        @csrf
                        @method('DELETE')

                    </form>
                </td>
        @endforeach
        </tbody>
    </table>
    <div class="new-book">
        <a href="{{ route('tags.create') }}" class="btn btn-success" style="float: right">Add new tag</a>
    </div>
    <div class="new-book">
        <a href="{{ route('site.index') }}" class="btn btn-outline-danger back-to-site">Back to site</a>
    </div>
    <div class="pag" style="margin-top: 15%;">
        <div class="pagination-page">
            {{ $tags->links() }}
        </div>
    </div>
</div>