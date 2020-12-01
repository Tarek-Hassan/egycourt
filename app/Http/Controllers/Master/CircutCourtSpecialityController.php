<?php

namespace App\Http\Controllers\Master;

use App\Models\Master\CircutCourtSpeciality;

use App\Models\Master\Circut;
use App\Models\Master\Court;
use App\Models\Master\CourtSpecialist;
use App\Models\Master\Government;
use App\Models\Master\CourtDegree;

use App\Http\Requests\Master\CircutCourtSpecialityRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App;

class CircutCourtSpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize(__FUNCTION__,CircutCourtSpeciality::class);
        $circut_court_specialities=CircutCourtSpeciality::with(['court','circut','courtSpecialist'])
        ->paginate(30);
        return view('master.circut_court_specialities.index',[
            'items'=>$circut_court_specialities,
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
        $this->authorize(__FUNCTION__,CircutCourtSpeciality::class);

        $governments=Government::all();
        $court_degrees=CourtDegree::all();
        $court_specialisties=CourtSpecialist::all();

        return view('master.circut_court_specialities.create',[
            'governments'=>$governments,
            'court_degrees'=>$court_degrees,
            'court_specialisties'=>$court_specialisties,
            
        ]);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CircutCourtSpecialityRequest $request)
    {
        $this->authorize(__FUNCTION__,CircutCourtSpeciality::class);

        CircutCourtSpeciality::create($request->all());

        return redirect()->route('circut_court_specialities.index')->with('success',trans('general.created'));
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CircutCourtSpeciality  $circutCourtSpeciality
     * @return \Illuminate\Http\Response
     */
    public function show(CircutCourtSpeciality $circutCourtSpeciality)
    {
        $this->authorize(__FUNCTION__,CircutCourtSpeciality::class);

        return view('master.circut_court_specialities.show',[

            'item'=>$circutCourtSpeciality,

        ]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CircutCourtSpeciality  $circutCourtSpeciality
     * @return \Illuminate\Http\Response
     */
    public function edit(CircutCourtSpeciality $circutCourtSpeciality)
    {
        $this->authorize(__FUNCTION__,CircutCourtSpeciality::class);

        $governments=Government::all();
        $court_degrees=CourtDegree::all();
        $court_specialisties=CourtSpecialist::all();

        return view('master.circut_court_specialities.edit',[

            'item'=>$circutCourtSpeciality,

            'governments'=>$governments,

            'court_degrees'=>$court_degrees,

            'court_specialisties'=>$court_specialisties,

        ]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CircutCourtSpeciality  $circutCourtSpeciality
     * @return \Illuminate\Http\Response
     */
    public function update(CircutCourtSpecialityRequest $request, CircutCourtSpeciality $circutCourtSpeciality)
    {
        $this->authorize(__FUNCTION__,CircutCourtSpeciality::class);

        $circutCourtSpeciality->update($request->all());
        
        return redirect()->route('circut_court_specialities.index')->with('success',trans('general.updated'));
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CircutCourtSpeciality  $circutCourtSpeciality
     * @return \Illuminate\Http\Response
     */
    public function destroy(CircutCourtSpeciality $circutCourtSpeciality)
    {
        $this->authorize(__FUNCTION__,CircutCourtSpeciality::class);
        //
    }
    // Ajax
    // Ajax getCourtsByGov
    public function getCourtByGovAndCourtDegree(Request $request)
    {
            $gov_id = $request->input('gov');

            $court_degree_id = $request->input('court_degree');

            $lang=App::getLocale();

            return Court::Select(
                        DB::raw(" id , name_$lang name"))
                ->where([ 
                    ['gov_id',$gov_id],
                    ['court_degree_id',$court_degree_id]
                ])->get();
                                    
    }

    public function getCircutByCourt(Request $request)
    {
            $court_id = $request->input('court');
            return Circut::where('court_id',$court_id)->get();
                                    
    }

}
