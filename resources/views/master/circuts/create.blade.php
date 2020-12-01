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
                            <li class="breadcrumb-item"><a
                                    href="{{ route('circuts.index') }}">{{trans('circut.circuts')}}</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">
                                    {{ trans('general.create_new') }}</a></li>
                            <li class="breadcrumb-item"></li>
                        </ol>
                    </nav>
                </div>
                <div class="widget-content widget-content-area">

                    <form id="createForm" action="{{ route('circuts.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="circut_no_Input">{{ trans('circut.circut_no') }} *</label>
                                <input type="text" class="form-control" id="circut_no_Input" name="circut_no" value="{{ old('circut_no') }}"
                                    placeholder="{{ trans('circut.circut_no') }}"
                                    autocomplete="disabled" autofocus>
                                @error('circut_no')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="year_Input">{{ trans('circut.year') }} *</label>
                                <input type="number" class="form-control" id="year_Input" name="year" value="{{ old('year') }}"
                                    placeholder="{{ trans('circut.year') }}"
                                    autocomplete="disabled" autofocus>
                                @error('year')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="court_id_Input">{{trans('circut.court_id')}} *</label>
                                <select class="selectpicker form-control" id="court_id_Input"  name="court_id" data-size="10" title="{{trans('forms.select')}}">
                                    @foreach ($courts as $court)    
                                        <option value="{{$court->id}}"  > {{App::isLocale('en') ? $court->name_en :$court->name_ar}} </option>
                                    @endforeach
                                       
                                </select>
                                @error('court_id')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit"
                                    class="btn btn-primary mt-3">{{ trans('forms.create') }}</button>
                                <a href="{{ route('circuts.index') }}"
                                    class="btn btn-danger mt-3">{{ trans('forms.cancel') }}</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
