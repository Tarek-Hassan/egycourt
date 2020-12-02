
                <hr>
                <div class="row">
                    <div class="col-md-2">
                        <h3><b>{{ trans('court_schedule.case_year') }}</b></h3>
                    </div>

                    <div class="col-md-2">
                        <h3><b>{{ trans('court_schedule.case_no') }}</b></h3>
                    </div>

                    <div class="col-md-5">
                        <h3><b>{{ trans('court_schedule.case_desc') }}</b></h3>
                    </div>

                    <div class="col-md-2">
                        <h3><b>{{ trans('court_schedule.order') }}</b></h3>
                    </div>

                    <div class="col-md-1">
                        <h3></h3>
                    </div>
                </div>
                <hr>

                <div class="schedule_main_div">

                    <div class="row mb-1 schedule_clone_div">
                        
                        <div class="form-group col-md-2">
                            <input type="number" class="form-control case_year"  name="schedule_details[1][case_year]" 
                                placeholder="{{ trans('court_schedule.case_year') }}"
                                autocomplete="disabled" autofocus>
                            @error('schedule_details.*.case_year')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <input type="text" class="form-control case_no"  name="schedule_details[1][case_no]" 
                                placeholder="{{ trans('court_schedule.case_no') }}"
                                autocomplete="disabled" autofocus>
                            @error('schedule_details.*.case_no')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-5">
                            <input type="text" class="form-control case_desc"  name="schedule_details[1][case_desc]" 
                                placeholder="{{ trans('court_schedule.case_desc') }}"
                                autocomplete="disabled" autofocus>
                            @error('schedule_details.*.case_desc')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-2">
                            <input type="hidden" class="order" name="schedule_details[1][order]" value="1"/>
                        </div>

                        <div class="col-md-1">
                            <div class="form-group button mb-0 mt-2">
                                    <i class="fas fa-plus-circle text-success add_schedule_details_desc fa-lg"></i>
                            </div>    
                        </div>
                    </div>

                </div>
              


@push('scripts')

      <script>
            var x = 1;
            $(function () {

                $(".schedule_main_div").on('click', '.add_schedule_details_desc', function () {
                    x++;
                    var div = $(".schedule_main_div .schedule_clone_div").clone();
                    div.removeClass();
                    div.addClass(" row mb-1 schedule_details"+ x);
                    div.find(".invalid-feedback").html("");
                    div.find('.case_year').attr('name', "schedule_details[" + x + "][case_year]").val('');
                    div.find('.case_no').attr('name', "schedule_details[" + x + "][case_no]").val('');
                    div.find('.case_desc').attr('name', "schedule_details[" + x + "][case_desc]").val('');
                    div.find('.order').attr('name', "schedule_details[" + x + "][order]").val(x);

                    div.find('.button').append(
                        "  <i id='" + x + "' class='fas fa-times-circle fa-lg text-danger remove_schedule_details_desc mt-3 mx-2'></i>"
                    );
                    
                   $(".schedule_main_div").append(div);
                   $(".schedule_main_div").on('click', '.remove_schedule_details_desc', function () {
                        $(".schedule_details" + this.id).remove();
                    });
    
                });
            }); 
 
    </script> 
   
@endpush
