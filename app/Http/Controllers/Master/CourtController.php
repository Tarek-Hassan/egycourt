<?php

namespace App\Http\Controllers\Master;

use App\Models\Master\CourtDegree;
use App\Models\Master\Government;
use App\Models\Master\Court;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\CourtRequest;
use App;

class CourtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $this->authorize(__FUNCTION__,Court::class);
        $courts=Court::with(['government','courtDegree'])
        ->orderBy(App::isLocale('en') ? 'name_en' : 'name_ar')
        ->paginate(30);
        return view('master.courts.index',[
            'items'=>$courts,
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize(__FUNCTION__,Court::class);
        $governments=Government::all();
        $court_degrees=CourtDegree::all();
        return view('master.courts.create',[
            'governments'=>$governments,
            'court_degrees'=>$court_degrees,
        ]);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourtRequest $request)
    {
        $this->authorize(__FUNCTION__,Court::class);

        Court::create($request->all());
        
        return redirect()->route('courts.index')->with('success',trans('general.created'));
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Court  $court
     * @return \Illuminate\Http\Response
     */
    public function show(Court $court)
    {
        $this->authorize(__FUNCTION__,Court::class);

        return view('master.courts.show',[
            'item'=>$court,
        ]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Court  $court
     * @return \Illuminate\Http\Response
     */
    public function edit(Court $court)
    {
        $this->authorize(__FUNCTION__,Court::class);
        $governments=Government::all();
        $court_degrees=CourtDegree::all();

        return view('master.courts.edit',[
            'item'=>$court,
            'governments'=>$governments,
            'court_degrees'=>$court_degrees,
        ]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Court  $court
     * @return \Illuminate\Http\Response
     */
    public function update(CourtRequest $request, Court $court)
    {
        $this->authorize(__FUNCTION__,Court::class);
        $court->update($request->all());
        return redirect()->route('courts.index')->with('success',trans('general.updated'));
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Court  $court
     * @return \Illuminate\Http\Response
     */
    public function destroy(Court $court)
    {
        //
    }
}
