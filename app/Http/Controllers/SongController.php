<?php

namespace Anison\Http\Controllers;

use Anison\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    // All songs

    public function index()
    {
        $song = Song::all();

        return view('songs')->with('song', $song);
    }

    // Retrieve data for play page

    public function play($id)
    {
        $song = Song::find($id);

        return view('play')->with('song', $song);
    }

    // Submitting songs

    public function submit(Request $request)
    {
        $this->validate($request, [
            'song'    => 'required',
            'artist'  => 'required',
            'anime'   => 'required',
            'animeid' => 'required',
            'audioid' => 'required',
        ]);

        // Create new song
        $songs = new Song();
        $songs->song = $request->input('song');
        $songs->artist = $request->input('artist');
        $songs->artistid = $request->input('artistid');
        $songs->anime = $request->input('anime');
        $songs->animeid = $request->input('animeid');
        $songs->audioid = $request->input('audioid');
        $songs->lyrics = $request->input('lyrics');

        // Save song
        $songs->save();

        // Redirect when done
        return redirect('/')->with('success2', 'The song has been added to the database!');
    }
}
