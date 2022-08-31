<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;

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

        $data = [
            'comics' => $comics
        ];

        return view('comics.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // controllo se i dati passati sono validi
        $request->validate($this->getValidationRules());           

        $form_data = $request->all();
        // dd($form_data);

        //creo un nuovo comic
        $new_comic = new Comic();
        //popolo le colonne con il fill (non essendo dati sensibile [aggiungo nel model le collonne che possono essere popolate con il fill])
        $new_comic->fill($form_data);
        //salvo il nuovo comic
        $new_comic->save();
        //indirizzo l'utente alla show del nuovo comic creato
        return redirect()->route('comics.show', ['comic' => $new_comic->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::findOrFail($id);

        $data = [
            'comic' => $comic
        ];

        return view('comics.show', $data);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function getValidationRules() {
        return [
            'title' => 'required|max:50',
            'thumb' => 'required|max:60000',
            'description' => 'max:60000',
            'price' => 'required|max:10',
            'series' => 'required|max:30',
            'sale_date' => 'max:20',
            'type' => 'required|max:30'

        ];
    }

}
