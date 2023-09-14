<!-- resources/views/albums/create.blade.php -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">

<div class="container">
    <h1 class="text-center mt-4">Create Album</h1>
    <form method="POST" action="{{ route('albums.store') }}" class="mt-3">
        @csrf
        <div class="form-group">
            <label for="name">Album Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary">Create Album</button>
        </div>
    </form>
</div>
