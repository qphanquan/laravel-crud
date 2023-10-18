<form action="{{route('authors.store')}}" method="post">
    @csrf

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="name">Bio:</label>
        <textarea name="bio" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>