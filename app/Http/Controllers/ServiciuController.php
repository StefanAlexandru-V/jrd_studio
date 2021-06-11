<?php

namespace App\Http\Controllers;

use App\Models\Serviciu;
use Illuminate\Http\Request;

class ServiciuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $servicii = Serviciu::with('cerere')->get();
        return view('serviciu.index')->with([
            'servicii' => $servicii ? $servicii : ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('serviciu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titlu' => 'required',
            'detalii' => 'required',
            'pret_orientativ' => 'required|numeric',
        ]);

        $serviciu = new Serviciu();

        $serviciu->titlu = $request->get('titlu');
        $serviciu->detalii = $request->get('detalii');
        $serviciu->pret_orientativ = $request->get('pret_orientativ');
        $serviciu->evidentiat = $request->get('evidentiat') == 'on' ? '1' : '0';

        if($request->imagine) {
            $imageName = time().'.'.$request->imagine->extension();
            $request->imagine->move(public_path('images'), $imageName);
            $serviciu->imagine = $imageName;
        }

        $serviciu->save();
        return redirect(route('serviciu.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Serviciu  $serviciu
     * @return \Illuminate\Http\Response
     */
    public function show(Serviciu $serviciu)
    {
        return view('serviciu.show')->with([
            'serviciu'=> $serviciu,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Serviciu  $serviciu
     * @return \Illuminate\Http\Response
     */
    public function edit(Serviciu $serviciu)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Serviciu  $serviciu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Serviciu $serviciu)
    {

        $validated = $request->validate([
            'titlu' => 'required',
            'detalii' => 'required',
            'pret_orientativ' => 'required',
        ]);

        $serviciu->titlu = $request->get('titlu');
        $serviciu->detalii = $request->get('detalii');
        $serviciu->pret_orientativ = $request->get('pret_orientativ');
        $serviciu->evidentiat = $request->get('evidentiat') ? 1 : 0;

        if ($request->imagine) {
            $imageName = time() . '.' . $request->imagine->extension();
            $request->imagine->move(public_path('images'), $imageName);

            $serviciu->imagine = $imageName;
        }

        $serviciu->save();
        return redirect(route('serviciu.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Serviciu  $serviciu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Serviciu $serviciu)
    {
        $serviciu->delete();

        return redirect(route('serviciu.index'));
    }
}
