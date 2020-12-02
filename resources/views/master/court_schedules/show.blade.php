@extends('layouts.app')
@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-one">
                <div class="widget-heading">
                    <nav class="breadcrumb-two" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">{{trans('general.master_data')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('court_schedules.index')}}">{{trans('circut_court_speciality.circut_court_speciality')}}</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);"> {{ trans('general.show') }}</a></li>
                            <li class="breadcrumb-item"></li>
                        </ol>
                    </nav>
                </div>
                <div class="widget-content widget-content-area">
                    <form id="createForm" action="{{route('court_schedules.edit',$item)}}" method="get">

                        <div class="row">

                            <div class="form-group col-md-4">
                                <label >{{trans('court_schedule.user_name')}}</label>
                                <input  class="form-control"   value="{{Auth::user()->full_name}}" disabled>
                            </div>

                            <div class="form-group col-md-4">
                                <label >{{trans('court_schedule.court_id')}}</label>
                                <input  class="form-control"   value="{{App::isLocale('en') ? Auth::user()->court->name_en : Auth::user()->court->name_ar}}" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label >{{trans('court_schedule.circut_id')}}</label>
                                <input  class="form-control"   value="{{Auth::user()->circut->year}}/{{Auth::user()->circut->circut_no}}" disabled>
                            </div>
                        </div>

                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for="court_speciality_id">{{trans('court_schedule.court_speciality_id')}} *</label>
                                <input  value="{{App::isLocale('en') ? $item->courtSpecialist->name_en :$item->courtSpecialist->name_ar}}" class="form-control form-control-sm flatpickr flatpickr-input active" type="text" disabled>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="circut_no_Input">{{ trans('court_schedule.role_no') }} *</label>
                                <input type="text" class="form-control" id="role_no_Input" value="{{ $item->role_no}}"
                                    placeholder="{{ trans('court_schedule.role_no') }}"
                                    autocomplete="disabled" disabled>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="case_date">{{ trans('court_schedule.case_date') }} *</label>
                                <input  value="{{  $item->case_date }}" class="form-control form-control-sm flatpickr flatpickr-input active" type="text" disabled>
                            </div>

                        </div>

                        <hr>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-2">
                                <h3><b>{{ trans('court_schedule.order') }}</b></h3>
                            </div>
        
                            <div class="col-md-3">
                                <h3><b>{{ trans('court_schedule.case_year') }}</b></h3>
                            </div>
        
                            <div class="col-md-3">
                                <h3><b>{{ trans('court_schedule.case_no') }}</b></h3>
                            </div>
        
                            <div class="col-md-4">
                                <h3><b>{{ trans('court_schedule.case_desc') }}</b></h3>
                            </div>
        
                        </div>
                        <hr>
                        
                        @if (count($courtScheduleDetails)>0)
                            @foreach ($courtScheduleDetails as $courtScheduleDetail)
                                <div class="row d-flex justify-content-center">
                                    <div class="form-group col-md-2">
                                        <input type="text" class="form-control"  value="{{ $courtScheduleDetail->order}}"  disabled>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control"  value="{{ $courtScheduleDetail->case_year}}"  disabled>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control"  value="{{ $courtScheduleDetail->case_no}}"  disabled>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control"  value="{{ $courtScheduleDetail->case_desc}}"  disabled>
                                    </div>

                                </div>
                            @endforeach
                            
                        @else
                            <div class="form-group col-md-12 text-center">
                                <p>{{ trans('home.no_data_found') }}</p>
                            </div>
                        @endif
                       
                        <div class="row">
                            <div class="col-md-12 text-center">
                                @permission('CourtScheduleHeader-Edit')
                                    <button type="submit" class="btn btn-primary mt-3">{{trans('forms.edit')}}</button>
                                @endpermission
                                    <a href="{{route('court_schedules.index')}}" class="btn btn-danger mt-3">{{trans('forms.cancel')}}</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('styles')
    <link href="{{asset('plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" >
@endpush
@push('scripts')
<script src="{{asset('plugins/bootstrap-select/bootstrap-select.min.js')}}"></script>
@endpush
