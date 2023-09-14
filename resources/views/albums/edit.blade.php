<!-- resources/views/albums/edit.blade.php -->

<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">

<div class="container">
    <h1>Edit Album</h1>
    <form method="POST" action="{{ route('albums.update', $album->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Album Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $album->name }}" required>
        </div>
        <!-- Add an input field for uploading images -->
        <div class="form-group">
            <label for="images">Add/Edit Images:</label>
            <input type="file" name="images[]" class="form-control-file" multiple accept="image/*">
        </div>
        <!-- List existing images for editing or deletion -->
        <div class="form-group">
            <label for="existing_images">Existing Images:</label>
            <ul>
                @foreach ($album->pictures as $picture)
                    <li>
                        <img src="{{ asset($picture->image_path) }}">
                        <input type="text" name="picture_names[{{ $picture->id }}]" value="{{ $picture->name }}"
                            class="form-control" placeholder="Picture Name">
                        <input type="checkbox" name="delete_images[]" value="{{ $picture->id }}"> Delete
                    </li>
                @endforeach
            </ul>
        </div>
        <button type="submit" class="btn btn-primary">Update Album</button>
    </form>
</div>
