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
                            <li class="breadcrumb-item active"><a href="javascript:void(0);"> {{trans('forms.edit')}}</a></li>
                            <li class="breadcrumb-item"></li>
                        </ol>
                    </nav>
                </div>
                <div class="widget-content widget-content-area">
                <form id="createForm" action="{{route('courts.update',$item)}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="namearInput">{{trans('general.name_ar')}} *</label>
                            <input type="text" class="form-control" id="namearInput" name="name_ar" value="{{old('name_ar',$item->name_ar)}}"
                                 placeholder="{{trans('general.name_ar')}}" autocomplete="disabled" autofocus>
                                @error('name_ar')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name_enInput">{{trans('general.name_en')}}</label>
                            <input type="text" class="form-control" id="name_enInput" name="name_en" value="{{old('name_en',$item->name_en)}}"
                                 placeholder="{{trans('general.name_en')}}" autocomplete="disabled" autofocus>
                                @error('name_en')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="mainGovInput">{{trans('court.government')}} *</label>
                            <select class="selectpicker form-control" id="mainGovInput"  name="gov_id" data-size="10" title="{{trans('forms.select')}}">
                                @foreach ($governments as $government)    
                                    <option value="{{$government->id}}"  {{$item->gov_id == $government->id ? 'selected':''}}> {{App::isLocale('en') ? $government->name_en??$government->name_ar :$government->name_ar}} </option>
                                @endforeach
                                   
                            </select>
                            @error('gov_id')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="mainGovInput">{{trans('court.court_degree_id')}} *</label>
                            <select class="selectpicker form-control" id="mainGovInput"  name="court_degree_id" data-size="10" title="{{trans('forms.select')}}">
                                @foreach ($court_degrees as $court_degree)    
                                    <option value="{{$court_degree->id}}"  {{$item->court_degree_id == $court_degree->id ? 'selected':''}}> {{App::isLocale('en') ? $court_degree->name_en??$court_degree->name_ar :$court_degree->name_ar}} </option>
                                @endforeach
                                   
                            </select>
                            @error('court_degree_id')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>


                        <div class="form-group col-md-6">
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

                    <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary mt-3">{{trans('forms.update')}}</button>
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
