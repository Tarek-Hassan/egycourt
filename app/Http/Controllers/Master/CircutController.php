<?php

namespace App\Http\Controllers\Master;

use App\Models\Master\Circut;
use App\Models\Master\Court;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\CircutRequest;
use App;

class CircutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize(__FUNCTION__,Circut::class);
        $circuts=Circut::with('court')
        ->orderBy('year')
        ->paginate(30);
        return view('master.circuts.index',[
            'items'=>$circuts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize(__FUNCTION__,Circut::class);

        $courts=Court::all();

        return view('master.circuts.create',[
            'courts'=>$courts,
            
        ]);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CircutRequest $request)
    {
        $this->authorize(__FUNCTION__,Circut::class);

        Circut::create($request->all());
        
        return redirect()->route('circuts.index')->with('success',trans('general.created'));
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Circut  $circut
     * @return \Illuminate\Http\Response
     */
    public function show(Circut $circut)
    {
        $this->authorize(__FUNCTION__,Circut::class);

        return view('master.circuts.show',[
            'item'=>$circut,
        ]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Circut  $circut
     * @return \Illuminate\Http\Response
     */
    public function edit(Circut $circut)
    {
        $this->authorize(__FUNCTION__,Circut::class);

        $courts=Court::all();

        return view('master.circuts.edit',[
            'item'=>$circut,
            'courts'=>$courts,
        ]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Circut  $circut
     * @return \Illuminate\Http\Response
     */
    public function update(CircutRequest $request, Circut $circut)
    {
        $this->authorize(__FUNCTION__,Circut::class);

        $circut->update($request->all());
        
        return redirect()->route('circuts.index')->with('success',trans('general.updated'));
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Circut  $circut
     * @return \Illuminate\Http\Response
     */
    public function destroy(Circut $circut)
    {
        //
    }
}
