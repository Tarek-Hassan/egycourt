<?php

namespace App\Http\Controllers\Master;

use App\Models\Master\CourtScheduleDetail;
use App\Models\Master\CourtScheduleHeader;
use App\Models\Master\CircutCourtSpeciality;

use App\Models\Master\CourtSpecialist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App;

class CourtScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize(__FUNCTION__,CourtScheduleHeader::class);
        $court_schedule_headers=CourtScheduleHeader::with(['circutCourtSpeciality','user','courtScheduleDetails'])
        ->paginate(30);
        return view('master.court_schedules.index',[
            'items'=>$court_schedule_headers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize(__FUNCTION__,CourtScheduleHeader::class);

        // $court_specialist_arr=Auth::user()->court->circutCourtSpecialities->pluck(['id','court_specialist_id']);
        // dd($court_specialist_arr);
        // $court_specialists=CourtSpecialist::whereIn('id',$court_specialist_arr)->get();

        // dd($court_specialists[0]);

        return view('master.court_schedules.create',[
            // 'court_specialists'=>$court_specialists,
          
            
        ]);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize(__FUNCTION__,CourtScheduleHeader::class);
        
        $request['created_by']=Auth::user()->id;
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourtScheduleDetail  $courtScheduleDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CourtScheduleDetail $courtScheduleDetail)
    {
        $this->authorize(__FUNCTION__,CourtScheduleHeader::class);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourtScheduleDetail  $courtScheduleDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(CourtScheduleDetail $courtScheduleDetail)
    {
        $this->authorize(__FUNCTION__,CourtScheduleHeader::class);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourtScheduleDetail  $courtScheduleDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourtScheduleDetail $courtScheduleDetail)
    {
        $this->authorize(__FUNCTION__,CourtScheduleHeader::class);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourtScheduleDetail  $courtScheduleDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourtScheduleDetail $courtScheduleDetail)
    {
        //
    }
}
