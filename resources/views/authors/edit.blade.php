<form action="{{route('authors.update', $author->id)}}" method="post">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control" value="{{ $author->name }}" required>
    </div>

    <div class="form-group">
        <label for="name">Bio:</label>
        <textarea name="bio" class="form-control" required>{{ $author->bio }}</textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>