<?php

namespace App\Http\Controllers;

use App\Models\Comanda;
use App\Models\Factura;
use App\Models\Serviciu;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ComandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $comenzi = Comanda::with('client')->get();
        return view('comanda.index')->with([
            'comenzi' => $comenzi ? $comenzi : ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $servicii = Serviciu::all();
        return view('comanda.create')->with([
            'servicii' => $servicii,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comanda  $comanda
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Comanda $comanda)
    {
        $servicii = Serviciu::all();
        return view('comanda.show')->with([
            'comanda' => $comanda,
            'servicii' => $servicii,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comanda  $comanda
     * @return \Illuminate\Http\Response
     */
    public function edit(Comanda $comanda)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comanda  $comanda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comanda $comanda)
    {
        $comanda->nume_client = $request->get('nume_client');
        $comanda->status = $request->get('status');
        $comanda->cerere->telefon_client = $request->get('telefon_client');
        $comanda->cerere->adresa_client = $request->get('adresa_client');
        $comanda->cerere->mesaj = $request->get('mesaj');
        $comanda->pret = intval($request->get('pret'));
        $comanda->tip_comanda = $request->get('tip_comanda');
        $comanda->data_programare = $request->get('data_programare');
        $comanda->cerere->data_incheiere = Carbon::parse($request->get('data_programare'))->addDays(30);
        $comanda->save();


        return redirect(route('comanda.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comanda  $comanda
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(Comanda $comanda)
    {
        $comanda->delete();
        return redirect(route('comanda.index'));
    }

    public function genereazaFactura(Comanda $comanda) {
        $data = $comanda;
        $comanda->facturata = 1;
        $comanda->save();

        $factura = new Factura();
        $factura->nume_client = $comanda->nume_client;
        $factura->adresa_client = $comanda->cerere->adresa_client;
        $factura->id_client = $comanda->id_client;
        $factura->id_comanda = $comanda->id;
        $factura->serviciu = Serviciu::where('id', $comanda->cerere->serviciu)->pluck('titlu')->first();
        $factura->suma = $comanda->pret;
        $factura->moneda = 'RON';
        $factura->data_incheiere = Carbon::parse($comanda->data_programare)->addDays(30);
        $factura->save();
        view()->share('comanda', $data);
        $pdf = PDF::loadView('factura', $data);

        return $pdf->download('factura-' . auth()->user()->nume_intreg . '-' . Carbon::now());
    }

    public function genereazaRaport() {
        $comenzi = Comanda::all();
        view()->share('comenzi', $comenzi);
        $pdf = PDF::loadView('raport_comenzi', $comenzi);

        return $pdf->download('raport_comenzi-' . Carbon::now() . '.pdf');
    }
}
