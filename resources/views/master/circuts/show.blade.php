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
                            <li class="breadcrumb-item"><a href="{{route('circuts.index')}}">{{trans('circut.circuts')}}</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">{{trans('forms.show')}} {{$item->year}}/{{$item->circut_no}}</a></li>
                            <li class="breadcrumb-item"></li>
                        </ol>
                    </nav>
                </div>
                <div class="widget-content widget-content-area">
                    <form id="createForm" action="{{route('circuts.edit',$item)}}" method="get">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="circut_no_Input">{{trans('circut.circut_no')}}</label>
                                <input type="text" class="form-control" id="circut_no_Input"  value="{{$item->circut_no}}" disabled>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="yearInput">{{trans('circut.year')}}</label>
                                <input type="text" class="form-control" id="yearInput"  value="{{$item->year}}" disabled>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="court_id_Input">{{trans('circut.court_id')}} *</label>
                            <input type="text" class="form-control" id="court_id_Input"  value="{{App::isLocale('en') ? $item->court->name_en??$item->court->name_ar :$item->court->name_ar}}" disabled>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="mainActiveInput">{{trans('general.is_active')}} </label>
                            <select class="selectpicker form-control" id="mainActiveInput"  name="is_active" data-size="10" title="{{trans('forms.select')}}" disabled>
                                    <option value="1" {{$item->is_active == 1 ? 'selected':''}}>{{trans('general.active')}}</option>
                                    <option value="0" {{$item->is_active == 0 ? 'selected':''}}>{{trans('general.deactivate')}}</option>
                            </select>
                        </div>

                       <div class="row">
                            <div class="col-md-12 text-center">
                                @permission('Circut-Edit')
                                <button type="submit" class="btn btn-primary mt-3">{{trans('forms.edit')}}</button>
                                @endpermission
                                <a href="{{route('circuts.index')}}" class="btn btn-danger mt-3">{{trans('forms.cancel')}}</a>
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
