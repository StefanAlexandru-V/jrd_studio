<?php

namespace App\Http\Controllers;

use App\Models\Cerere;
use App\Models\Comanda;
use App\Models\Serviciu;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CerereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $cereri = Cerere::all();
        return view('cerere.index')->with([
            'cereri' => $cereri,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicii = Serviciu::all();

        return view('cerere.create')->with([
            'servicii' => $servicii,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nume_client' => 'required',
            'adresa_client' => 'required',
            'serviciu' => 'required',
            'telefon_client' => 'required'
        ]);

        $cerere = new Cerere();
        $cerere->id_client = $request->get('id_client');
        $cerere->id_serviciu = $request->get('id_serviciu');
        $cerere->nume_client = $request->get('nume_client');
        $cerere->adresa_client = $request->get('adresa_client');
        $cerere->serviciu = $request->get('serviciu');
        $cerere->telefon_client = $request->get('telefon_client');
        $cerere->mesaj = $request->get('mesaj');
        $cerere->save();

        return redirect(route('cerere.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cerere  $cerere
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Cerere $cerere)
    {
        $servicii = Serviciu::all();
        return view('cerere.show')->with([
            'servicii' => $servicii,
            'cerere' => $cerere,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cerere  $cerere
     * @return \Illuminate\Http\Response
     */
    public function edit(Cerere $cerere)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cerere  $cerere
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Cerere $cerere)
    {
        $validated = $request->validate([
            'nume_client' => 'required',
            'adresa_client' => 'required',
            'serviciu' => 'required',
            'telefon_client' => 'required'
        ]);

        $cerere->nume_client = $request->get('nume_client');
        $cerere->adresa_client = $request->get('adresa_client');
        $cerere->serviciu = $request->get('serviciu');
        $cerere->telefon_client = $request->get('telefon_client');
        $cerere->mesaj = $request->get('mesaj');
        $cerere->save();

        return redirect(route('cerere.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cerere  $cerere
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(Cerere $cerere)
    {
        $cerere->delete();
        return redirect(route('cerere.index'));
    }

    public function genereazaComanda(Cerere $cerere) {
        $comanda = new Comanda();

        $comanda->cerere_id = $cerere->id;
        $comanda->id_client = $cerere->user->id;
        $comanda->nume_client = $cerere->nume_client;
        $comanda->numar_cerere = $cerere->id;
        $comanda->pret = Serviciu::where('id', $cerere->id_serviciu)->first()->pret_orientativ;
        $comanda->tip_comanda = 'normal';
        $comanda->data_programare = $cerere->created_at->addDays(30);
        $comanda->status = 'neprocesata';

        $comanda->save();

        return redirect(route('comanda.index'));
    }

    public function incarcaCereri(Cerere $cerere) {
        $cerere_corecta = Cerere::where('id', $cerere->id )->first();
        return $cerere_corecta;
    }

    public function genereazaRaport() {
        $cereri = Cerere::all();
        view()->share('cereri', $cereri);
        $pdf = PDF::loadView('raport_cereri', $cereri);

        return $pdf->download('raport_cereri-' . Carbon::now() . '.pdf');
    }
}
