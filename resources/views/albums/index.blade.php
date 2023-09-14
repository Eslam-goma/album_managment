<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albums</title>
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <!-- Link to Bootstrap CSS (assuming you have it installed) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Albums</h1>
        <a href="{{ route('albums.create') }}" class="btn btn-primary mb-3">Create New Album</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Album Name</th>
                    <th>Images</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($albums as $album)
                    <tr>
                        <td>{{ $album->name }}</td>
                        <td>
                            <a href="{{ route('albums.show', $album->id) }}" class="btn btn-info btn-sm">View
                                Pictures</a>
                        </td>
                        <td>
                            <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('albums.destroy', $album->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this album?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
