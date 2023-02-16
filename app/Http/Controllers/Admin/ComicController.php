<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comic;


class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('admin.comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation => validate vuole un array associativo 'key' => 'value'
        // $key (il name di ogni attributo da controllare)
        // $value (i tipi di validation da verificare)
        $request->validate([
            'title' => 'required|min:2|max:100',
            'description' => 'required|min:10|max:1000',
            'thumb' => 'required|url|max:255',
            'price' => 'required|decimal:2|numeric',
            'series' => 'required|min:2|max:100',
            'sale_date' => 'required|date|after:1940-01-01|before:today',
            'type' => 'required|min:2|max:255'
        ]);

        $comic = $request->all();
        $newComic = new Comic();
        $newComic->fill($comic);
        $newComic->save();
        return redirect()->route('admin.comics.index', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show record by id
        $comic = Comic::findOrFail($id);
        return view('admin.comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find or fail
        $comic = Comic::findOrFail($id);
        return view('admin.comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();
        $comic->update($data);
        return redirect()->route('admin.comics.index', $comic->id);
    }
    public function restoreDeleted($id)
    {
        $comic = Comic::onlyTrashed()->find($id);
        $comic->restore();
        $message = "{$comic->title} è stato ripristinato";
        return redirect()->route('admin.comics.trashed')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();
        return redirect()->route('admin.comics.index', $comic->id);
    }

    public function trashed()
    {
        $comicTrashed = Comic::onlyTrashed()->get();

        return view('admin.comics.softDeleted', compact('comicTrashed'));
    }


    public function forceDelete($id)
    {
        Comic::onlyTrashed()->find($id);
        $comic = Comic::onlyTrashed()->find($id);
        $comic->forceDelete();
        $deleteMessage = "{$comic->title} è stato eliminato dal db";
        return redirect()->route('admin.comics.trashed')->with('deleteMessage', $deleteMessage);
    }
}
