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
                            <li class="breadcrumb-item"><a href="{{route('court_schedules.index')}}">{{trans('circut.circuts')}}</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);"> {{trans('forms.edit')}}</a></li>
                            <li class="breadcrumb-item"></li>
                        </ol>
                    </nav>
                </div>
                <div class="widget-content widget-content-area">
                    <form id="createForm" action="{{route('court_schedules.update',$item->id)}}" method="POST">
                        @csrf
                        @method('put')


    
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
                                <select class="selectpicker form-control get_court" id="court_speciality_id"  name="court_speciality_id" data-size="10" title="{{trans('forms.select')}}">

                                    @foreach ($court_specialists as $court_specialist)    
                                        <option value="{{$court_specialist->id}}" {{$item->courtSpecialist->id == $court_specialist->id ? 'selected':''}}> {{App::isLocale('en') ? $court_specialist->name_en :$court_specialist->name_ar}} </option>
                                    @endforeach
                                       
                                </select>
                                @error('court_speciality_id')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="role_no">{{ trans('court_schedule.role_no') }} *</label>
                                <input type="text" class="form-control" id="role_no" name="role_no" value="{{ $item->role_no}}"
                                    placeholder="{{ trans('court_schedule.role_no') }}"
                                    autocomplete="disabled" autofocus>
                                @error('role_no')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="case_date">{{ trans('court_schedule.case_date') }} *</label>
                                <input id="case_date" value="{{  $item->case_date }}" name="case_date" 
                                        class="form-control form-control-sm flatpickr flatpickr-input active" type="text">
                                @error('case_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                        <hr>

                        <div class="row  justify-content-center">
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
                      

                        <div class="justify-content-center">
                            @if (count($courtScheduleDetails)>0)
                                @foreach ($courtScheduleDetails as $courtScheduleDetail)
                                    <div class="row mb-1 ">

                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control"  value="{{ $courtScheduleDetail->order}}"  disabled>
                                        </div>
                                        
                                        <input type="hidden" name="schedule_details_update[{{$courtScheduleDetail->id}}][id]" value="{{$courtScheduleDetail->id}}"/>

                                        <div class="form-group col-md-3">
                                            <input type="number" class="form-control case_year"  name="schedule_details_update[{{$courtScheduleDetail->id}}][case_year]" 
                                        placeholder="{{ trans('court_schedule.case_year') }}" value="{{$courtScheduleDetail->case_year}}"
                                                autocomplete="disabled" autofocus>

                                            @if (array_key_exists("schedule_details_update.$courtScheduleDetail->id.case_year",$errors->getMessages()))
                                                @error("schedule_details_update.$courtScheduleDetail->id.case_year")
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif

                                        </div>
                
                                        <div class="form-group col-md-3">
                                            <input type="text" class="form-control case_no"  name="schedule_details_update[{{$courtScheduleDetail->id}}][case_no]" 
                                                placeholder="{{ trans('court_schedule.case_no') }}" value="{{$courtScheduleDetail->case_no}}"
                                                autocomplete="disabled" autofocus>

                                            @if (array_key_exists("schedule_details_update.$courtScheduleDetail->id.case_no",$errors->getMessages()))
                                                @error("schedule_details_update.$courtScheduleDetail->id.case_no")
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif

                                        </div>
                
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control case_desc"  name="schedule_details_update[{{$courtScheduleDetail->id}}][case_desc]" 
                                                placeholder="{{ trans('court_schedule.case_desc') }}" value="{{$courtScheduleDetail->case_desc}}"
                                                autocomplete="disabled" autofocus>

                                            @if (array_key_exists("schedule_details_update.$courtScheduleDetail->id.case_desc",$errors->getMessages()))
                                                @error("schedule_details_update.$courtScheduleDetail->id.case_desc")
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @endif

                                        </div>

                                    </div>
                                @endforeach
                            @else
                                <div class="form-group col-md-12 text-center">
                                    <p>{{ trans('home.no_data_found') }}</p>
                                </div>
                            @endif
                        </div>

                        
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary mt-3">{{trans('forms.update')}}</button>
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
    <link href="{{ asset('plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('scripts')
<script src="{{ asset('plugins/flatpickr/flatpickr.js') }}"></script>
<script>
    var deposit_date = flatpickr(document.getElementById('case_date'));
</script>
@endpush