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
                            <li class="breadcrumb-item"><a href="{{route('courts.index')}}">{{trans('court.courts')}}</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);"> {{App::isLocale('en') ? $item->name_en :$item->name_ar}}</a></li>
                            <li class="breadcrumb-item"></li>
                        </ol>
                    </nav>
                </div>
                <div class="widget-content widget-content-area">
                <form id="createForm" action="{{route('courts.edit',$item)}}" method="get">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="namearInput">{{trans('general.name_ar')}}</label>
                                <input type="text" class="form-control" id="namearInput"  value="{{$item->name_ar}}" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name_enInput">{{trans('general.name_en')}}</label>
                                <input type="text" class="form-control" id="name_enInput"  value="{{$item->name_en}}" disabled>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="mainGovInput">{{trans('court.government')}} *</label>
                            <input type="text" class="form-control" id="nameInput"  value="{{App::isLocale('en') ? $item->government->name_en :$item->government->name_ar}}" disabled>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="mainGovInput">{{trans('court.court_degree_id')}} *</label>
                            <input type="text" class="form-control" id="nameInput"  value="{{App::isLocale('en') ? $item->courtDegree->name_en :$item->courtDegree->name_ar}}" disabled>
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
                                @permission('Court-Edit')
                                <button type="submit" class="btn btn-primary mt-3">{{trans('forms.edit')}}</button>
                                @endpermission
                                <a href="{{route('courts.index')}}" class="btn btn-danger mt-3">{{trans('forms.cancel')}}</a>
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
