<!-- resources/views/albums/move-pictures.blade.php -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">

<div class="container">
    <h1>Move Pictures</h1>
    <form method="POST" action="{{ route('albums.handle-move-pictures', $album->id) }}">
        @csrf

        <div class="form-group">
            <label for="target_album_id">Select Target Album:</label>
            <select name="target_album_id" class="form-control" required>
                @foreach($otherAlbums as $otherAlbum)
                    <option value="{{ $otherAlbum->id }}">{{ $otherAlbum->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="text-center mt-3">
            <button type="submit" class="btn btn-warning">Move Pictures</button>
            <a href="{{ route('albums.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
