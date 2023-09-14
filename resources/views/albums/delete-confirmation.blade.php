<!-- resources/views/albums/delete-confirmation.blade.php -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">

<div class="containers">
    <h1>Delete Album: {{ $album->name }}</h1>
    <p>This album contains {{ $album->pictures->count() }} pictures. Choose an action:</p>
    
    <form method="POST" action="{{ route('albums.destroy', $album->id) }}">
        @csrf
        @method('DELETE')
        
        <!-- Option 1: Delete all pictures -->
        <button type="submit" name="action" value="delete_pictures" class="btn btn-danger">Delete All Pictures</button>
        
        <!-- Option 2: Move pictures to another album -->
        <a href="{{ route('albums.move-pictures', $album->id) }}" class="btn btn-warning">Move Pictures to Another Album</a>
        
        <!-- Cancel the delete operation -->
        <a href="{{ route('albums.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
