<?php

namespace App\Http\Controllers;

use App\Models\Song;

use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::paginate(15);
        return response()->json($songs);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required'
        ]);

        $song = new Song($request->all());
        $song->save();

        return response()->json([
            'created' => true
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $song = Song::find($id);
        $song->update($request->all());


        return response()->json([
            'updated' => true,
            'data' => $song->toArray()
        ]);
    }

    public function destroy(Request $request, $id)
    {
        $song = Song::find($id);
        $song->delete();


        return response()->json([
            'deleted' => true
        ]);
    }
}
