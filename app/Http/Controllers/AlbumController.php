<?php
namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('albums.index', compact('albums'));
    }
    public function edit(Album $album)
    {
        return view('albums.edit', compact('album'));
    }

public function update(Request $request, $albumId)
{
    $album = Album::findOrFail($albumId);

    // Update the album name
    $album->name = $request->input('name');
    $album->save();

    // Handle image uploads, picture names, and image paths
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $key => $image) {
            // Store the image in the 'public' disk and get the path
            $imagePath = $image->store('public/album_images');

            // Create or update a new picture record in the 'pictures' table
            $picture = $album->pictures()->updateOrCreate(
                ['id' => $key],
                [
                    'name' => $request->input("picture_names.$key", $image->getClientOriginalName()),
                    'image_path' => $imagePath,
                ]
            );
        }
    }

    // Handle image deletions
    if ($request->has('delete_images')) {
        foreach ($request->input('delete_images') as $pictureId) {
            // Delete the picture record and its associated file
            $picture = Picture::findOrFail($pictureId);
            Storage::delete($picture->image_path);
            $picture->delete();
        }
    }

    return redirect()->route('albums.index')->with('success', 'Album updated successfully.');
}

    public function destroy(Request $request, $albumId)
{
    $album = Album::findOrFail($albumId);

    if ($album->pictures->count() > 0) {
        // The album is not empty, redirect to the delete confirmation view
        return view('albums.delete-confirmation', compact('album'));
    }

    // Perform the actual delete if the album is empty
    $album->delete();

    return redirect()->route('albums.index')->with('success', 'Album deleted successfully.');
}
    public function show(Album $album)
{
    return view('albums.show', compact('album'));
}

public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Album::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('albums.index')->with('success', 'Album created successfully.');
    }

    public function movePictures($albumId)
    {
        $album = Album::findOrFail($albumId);
        $otherAlbums = Album::where('id', '!=', $albumId)->get();
    
        return view('albums.move-pictures', compact('album', 'otherAlbums'));
    }

    public function handleMovePictures(Request $request, $albumId)
    {
        $album = Album::findOrFail($albumId);
        $targetAlbumId = $request->input('target_album_id');
    
        // Perform the logic to move pictures to the target album
    
        // Redirect back to the album's edit page or any appropriate page
        return redirect()->route('albums.edit', $albumId)->with('success', 'Pictures moved successfully.');
    }
}
