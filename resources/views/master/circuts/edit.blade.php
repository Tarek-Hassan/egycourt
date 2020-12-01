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
                            <li class="breadcrumb-item active"><a href="javascript:void(0);"> {{trans('forms.edit')}}</a></li>
                            <li class="breadcrumb-item"></li>
                        </ol>
                    </nav>
                </div>
                <div class="widget-content widget-content-area">
                    <form id="createForm" action="{{route('circuts.update',$item)}}" method="POST">
                        @csrf
                        @method('put')

                        <div class="row">

                            <div class="form-group col-md-3">

                                <label for="circut_no_Input">{{trans('circut.circut_no')}} *</label>

                                <input type="text" class="form-control" id="circut_no_Input" name="circut_no" value="{{old('circut_no',$item->circut_no)}}" placeholder="{{trans('circut.circut_no')}}" autocomplete="disabled" autofocus>
                                @error('circut_no')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">

                                <label for="year_Input">{{trans('circut.year')}} *</label>

                                <input type="number" class="form-control" id="year_Input" name="year" value="{{old('year',$item->year)}}" placeholder="{{trans('circut.year')}}" autocomplete="disabled" autofocus>
                                @error('year')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">

                                <label for="court_id_Input">{{trans('court.court_id')}} *</label>
                                <select class="selectpicker form-control" id="court_id_Input"  name="court_id" data-size="10" title="{{trans('forms.select')}}">
                                    @foreach ($courts as $court)    
                                        <option value="{{$court->id}}"  {{$item->court_id == $court->id ? 'selected':''}}> {{App::isLocale('en') ? $court->name_en :$court->name_ar}} </option>
                                    @endforeach
                                       
                                </select>
                                @error('court_id')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="mainActiveInput">{{trans('general.is_active')}} </label>
                                <select class="selectpicker form-control" id="mainActiveInput"  name="is_active" data-size="10" title="{{trans('forms.select')}}">
                                        <option value="1" {{$item->is_active == 1 ? 'selected':''}}>{{trans('general.active')}}</option>
                                        <option value="0" {{$item->is_active == 0 ? 'selected':''}}>{{trans('general.deactivate')}}</option>
                                </select>
                                @error('is_active')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary mt-3">{{trans('forms.update')}}</button>
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
