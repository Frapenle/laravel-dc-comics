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
        return view('admin.comics.create', ['comic' => new Comic()]);
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
        $request->validate(
            [
                'title' => 'required|min:2|max:100',
                'description' => 'required|min:10|max:1000',
                'thumb' => 'required|url|max:255',
                'price' => 'required|decimal:2|numeric',
                'series' => 'required|min:2|max:100',
                'sale_date' => 'required|date|after:1900-01-01|before:today',
                'type' => 'required|min:2|max:255'
            ],
            // nel secondo array associativo inserire i messaggi personalizzati
            [
                'title.required' => 'Il titolo è obbligatorio',
                'title.min' => 'Il titolo deve avere almeno 2 caratteri',
                'title.max' => 'Il titolo può avere massimo 100 caratteri',
                'description.require' => 'La descrizione è obbligatoria',
                'description.min' => 'La descrizione deve avere almeno 10 caratteri',
                'description.max' => 'La descrizione può avere massimo 1000 caratteri',
                'thumb.required' => "L'URL è obbligatorio",
                'thumb.url' => "Inserire un URL valido",
                'thumb.max' => "Massimo 250 caratteri",
                'price.required' => "Il prezzo è obbligatorio",
                'price.decimal' => "Inserire 2 decimali",
                'price.numeric' => "Inserire solo numeri",
                'series.required' => "Campo series obbligatorio",
                'series.min' => "Series richiede almeno 2 caratteri",
                'series.max' => "Series accetta massimo 100 caratteri",
                'sale_date.required' => "La data di vendita è obbligatoria",
                'sale_date.date' => "Inserire una data in formato valido",
                'sale_date.after' => "Inserire data corretta, non può essere stato venduto prima del 1900",
                'sale_date.before' => "Inserire data corretta",
                'type.required' => 'Campo type obbligatorio',
                'type.min' => 'Campo type deve avere almeno 2 caratteri',
                'type.max' => 'Campo type non puo contenere più di 255 caratteri',
            ]
        );

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
     * @param  Comic $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        //find or fail
        return view('admin.comics.edit', ['comic' => $comic]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Comic $comic
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
        $message = "{$comic->title} è stato eliminato";
        return redirect()->route('admin.comics.index', $comic->id)->with('message', $message);
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
        $message = "{$comic->title} è stato eliminato dal db";
        return redirect()->route('admin.comics.trashed')->with('deleteMessage', $message);
    }
}
