<!-- resources/views/albums/show.blade.php -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">

<div class="container">
    <h1>Album: {{ $album->name }}</h1>
    <a href="{{ route('albums.index') }}" class="btn btn-primary mb-3">Back to Albums</a>
    <table class="table">
        <thead>
            <tr>
                <th>Picture Name</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($album->pictures as $picture)
                <tr>
                    <td>{{ $picture->name }}</td>
                    <td>
                        <img src="{{ asset($picture->image_path) }}" alt=" Image" class="p-image">

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
