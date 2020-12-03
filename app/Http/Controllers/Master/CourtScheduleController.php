<?php

namespace App\Http\Controllers\Master;

use App\Models\Master\CourtScheduleDetail;
use App\Models\Master\CourtScheduleHeader;
use App\Models\Master\CircutCourtSpeciality;
use App\Models\Master\Court;

use App\Models\Master\CourtSpecialist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Master\CourtScheduleUpdateRequest;
use App\Http\Requests\Master\CourtScheduleStoreRequest;

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
        
        $court_schedule_headers=CourtScheduleHeader::where('case_date','>=',(today())->format('Y-m-d'))
        ->with(['courtSpecialist','user','courtScheduleDetails'])
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
        $this->authorize(__FUNCTION__,CourtScheduleHeader::class);
        if(Auth::user()->is_super_admin){
            $court_specialists=CourtSpecialist::all();
        }
        else{
            $court_specialist_arr=Auth::user()->court->circutCourtSpecialities
                                ->where('circut_id',Auth::user()->circut->id)
                                ->pluck('court_specialist_id');

            $court_specialists=CourtSpecialist::whereIn('id',$court_specialist_arr)->distinct()->get();

        }
        
        $courts=Court::all();

        return view('master.court_schedules.create',[
            'court_specialists'=>$court_specialists,  
            'courts'=>$courts,  
        ]);
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourtScheduleStoreRequest $request)
    // public function store(Request $request)
    {
        
        $this->authorize(__FUNCTION__,CourtScheduleHeader::class);

        $request['created_by']=Auth::user()->id;

        $court_schedule_header=CourtScheduleHeader::create($request->all());

        foreach ($request->schedule_details as $value) {
            $value['court_schedule_header_id']=$court_schedule_header->id;
            $value['created_by']=Auth::user()->id;
            CourtScheduleDetail::create($value);
        }
        return redirect()->route('court_schedules.index')->with('success',trans('general.created'));
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourtScheduleDetail  $courtScheduleDetail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize(__FUNCTION__,CourtScheduleHeader::class);
      
        $courtScheduleHeader=CourtScheduleHeader::find($id);
        $courtScheduleDetails=CourtScheduleDetail::where('court_schedule_header_id',$id)->orderBy('order')->get();
        return view('master.court_schedules.show',[

            'item'=>$courtScheduleHeader,
            'courtScheduleDetails'=>$courtScheduleDetails,

        ]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourtScheduleDetail  $courtScheduleDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize(__FUNCTION__,CourtScheduleHeader::class);

        $court_specialist_arr=Auth::user()->court->circutCourtSpecialities
                                ->where('circut_id',Auth::user()->circut->id)
                                ->pluck('court_specialist_id');

        $court_specialists=CourtSpecialist::whereIn('id',$court_specialist_arr)->distinct()->get();

        $courtScheduleHeader=CourtScheduleHeader::find($id);
        $courts=Court::all();

        $courtScheduleDetails=CourtScheduleDetail::where('court_schedule_header_id',$id)->orderBy('order')->get();

        return view('master.court_schedules.edit',[

            'item'=>$courtScheduleHeader,
            'courtScheduleDetails'=>$courtScheduleDetails,
            'court_specialists'=>$court_specialists,
            'courts'=>$courts,

        ]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourtScheduleDetail  $courtScheduleDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    // public function update(CourtScheduleUpdateRequest $request,$id)
    {
        
     
    
        $this->authorize(__FUNCTION__,CourtScheduleHeader::class);

        $courtScheduleHeader=CourtScheduleHeader::find($id);
        $courtScheduleHeader->update($request->all());

        if($request->schedule_details_update){

            foreach ($request->schedule_details_update as $value) {

                $courtScheduleDetails=CourtScheduleDetail::find($value['id']);
                $courtScheduleDetails->update($value);

            }
        }

        if($request->schedule_details){
            foreach ($request->schedule_details as $value) {
                $value['court_schedule_header_id']=$id;
                $value['created_by']=Auth::user()->id;
                CourtScheduleDetail::create($value);
            }
        }
        
        return redirect()->route('court_schedules.index')->with('success',trans('general.created'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourtScheduleDetail  $courtScheduleDetail
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $court_schedule_detail=CourtScheduleDetail::find($id);
        return $court_schedule_detail->delete();
    }
}
