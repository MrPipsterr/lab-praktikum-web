<?php

namespace App\Http\Controllers;

use App\Models\song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::all();
        return view('song', compact('songs'));
    }

    function create() {
        return view('create');
    }

    function store(Request $request) {
        Song::create($request->except('_token'));
        return redirect()->route('songs.index');
    }
    
    public function songDetails($id)
    {
        $song = Song::find($id);
        return view('details', compact('song'));
    }

    function editData($id) {
        $song = Song::find($id);
        return view('edit', compact('song'));
    }

    function update($id, Request $request) {
        $song = Song::find($id);
        $song->update($request->except('_token'));
        return redirect()->route('songs.index');
    }
    
    public function destroy($id)
    {
        // Find the song by ID
        $song = Song::findOrFail($id);

        // Delete the song
        $song->delete();

        // Redirect back with a success message
        return redirect()->route('songs.index')->with('success', 'Song deleted successfully');
    }
}
