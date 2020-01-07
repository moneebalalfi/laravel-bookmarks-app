<?php

namespace App\Http\Controllers;

use App\Bookmark;
use Illuminate\Http\Request;

class BookmarksController extends Controller
{

    public function __construct(){
            $this->middleware('auth'); // To Auth The Bookmark Controller.
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookmarks = Bookmark::where('user_id', auth()->user()->id)->get();
        return view('home', compact('bookmarks'));
    }
   
    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'url' => 'required',
            'description' => 'nullable',
        ]);

        $userid = [
            'user_id' => auth()->user()->id,
        ];

        $validatedDate = array_merge($data, $userid);

        $bookmark = Bookmark::create($validatedDate);

        return redirect('/home')->with('success', 'Bookmark Added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookmark $bookmark)
    {
        $bookmark->delete();
    }
}
