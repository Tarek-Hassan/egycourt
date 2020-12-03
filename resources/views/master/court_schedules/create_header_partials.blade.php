@if(Auth::user()->is_super_admin)
    <div class="form-group col-md-4">
        <label for="court_id">{{trans('circut_court_speciality.court_id')}} *</label>
        <select class="selectpicker form-control " id="court_id"  name="court_id" data-size="10" title="{{trans('forms.select')}}" >
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

    <div class="form-group col-md-4">
        <label for="circut_id">{{trans('circut_court_speciality.circut_id')}} *</label>
        <select class="selectpicker form-control " id="circut_id"  name="circut_id" data-size="10" title="{{trans('forms.select')}}" disabled>

        </select>
        @error('circut_id')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
   
@else
    <div class="form-group col-md-4">
        <label >{{trans('court_schedule.court_id')}}</label>
        <input  class="form-control"    value="{{App::isLocale('en') ? Auth::user()->court->name_en : Auth::user()->court->name_ar}}" disabled>
        <input  class="form-control"   name="court_id" value="{{Auth::user()->court->id}}" hidden>
    </div>
    <div class="form-group col-md-4">
        <label >{{trans('court_schedule.circut_id')}}</label>
        <input  class="form-control"   name="circut_id" value="{{Auth::user()->circut->year}}/{{Auth::user()->circut->circut_no}}" disabled>
    </div>
@endif


@push('scripts')

    <script>

        $(".row").on('change', '#court_id', function () {

            let court_id = $("#court_id").val();
            let circut =$("#circut_id");

            $.ajax({
                url: '/master/circut_court',
                method: "GET",
                data: {
                    court:court_id,
                }
            }).done(function (response) {
                circut.empty();
                if (response.length > 0) {
                
                    circut.attr('disabled', false);
                    $.each(response, function (key, value) {
                        circut.append('<option value=' + value.id + '> ' + value.year +'/'+value.circut_no +'</option>');
                    });
                }else{
                    circut.attr('disabled', true);
                }
                circut.selectpicker('refresh');
            }).fail(function () {
                circut.attr('disabled', true);
            });

            });

            </script>

@endpush