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

    //1
    // per vedere tutti i dati insieme
    public function index(Request $request)
    {
        //prendo tutti i dati dal db e li  metto nella variabile $comics
        $comics = Comic::all();

        //per avere la conferma dell'eliminizione
        //prendo il dato passato
        $page_data = $request->all();
        //se deleted è settato allora mi torno 'yes' sennò mi torno null
        $deleted = isset($page_data['deleted']) ? $page_data['deleted'] : null;

        // metto i dati in $data
        $data = [
            'comics' => $comics,
            'deleted' => $deleted
        ];

        //usando compact che mi crea l'array
        return view('comics.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //3
    //per permettere all'utente di creare nuovi prodotti
    public function create()
    {
        //mi torno nella view l'indirizzo
        return view('comics.create');
        //la funzione create è legata alla funzione store
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //4
    //per salvare i dati del prodotto aggiunto dall'utente nel db
    public function store(Request $request)
    {
        
        // controllo se i dati passati sono validi
        $request->validate($this->getValidationRules());           

        //metto i dati aggiunti dall'utente nel form all'interno di $form_data
        $form_data = $request->all();
        

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

    //2
    //per vedere ogni singolo prodotto con i sui dettagli (me li "scandisco" grazie all'ID)
    public function show($id)
    {
        //nel variabile $comic metto il singolo elemento (se non lo trova mi torna errore 404)
        $comic = Comic::findOrFail($id);

        // metto i dati del singolo elemento in $data
        $data = [
            'comic' => $comic
        ];

        //mi torno nella view l'indirizzo a cui voglio andare e gli passo i dati
        return view('comics.show', $data);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //5
    //per permettre all'utente di modificare un prodotto
    // public function edit($id) -> uso findOrfail
    // public function edit(Comic $comic) non serve findOrFail
    public function edit(Comic $comic) 
    {
        //prendo il prodotto specifico
        // $comic = Comic::findOrFail($id);

        //la metto in $data
        // $data = [
        //     'comic' => $comic
        // ];

        //mi torno nella view l'indirizzo in cui voglio modificare i dati
        // return view('comics.edit', $data);
        return view('comics.edit', compact('comic'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //6
    //edit manda i dati ad update che aggiorna il db
    public function update(Request $request, Comic $comic)
    {
        // controllo se i dati passati sono validi
        $request->validate($this->getValidationRules());    

        //metto i dati modificati in $form_data
        $form_data = $request->all();

        //mi prendo il prodotto da aggiornare attraverso il suo ID
        // $comic_to_update = Comic::findOrFail($id);

        //aggiorno il prodotto tramite il metodo update
        // $comic_to_update->update($form_data);

        // laravel si occupa del find da sola scrivendo
        $comic->update($form_data);

        //mando l'utente alla pagina del prodotto appena aggiornato
        return redirect()->route('comics.show', $comic->id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //7
    //per cancellare un prodotto dal db
    public function destroy($id)
    {
        $comic_to_delete = Comic::findOrFail($id);
        $comic_to_delete->delete();

        return redirect()->route('comics.index', ['deleted' => 'yes']);
    }

    //5
    // funzione controllo validità dati
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
