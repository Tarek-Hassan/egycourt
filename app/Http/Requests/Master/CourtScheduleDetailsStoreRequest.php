<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use App;

class CourtScheduleDetailsStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
                
        return [

            'schedule_details.1.case_year'=>'required|digits:4',
            'schedule_details.1.case_no'=>'required',
            'schedule_details.1.case_desc'=>'required',
            'schedule_details.*.case_year'=>'nullable|digits:4',
            'schedule_details.*.case_no'=>'nullable',
            'schedule_details.*.case_desc'=>'nullable',
        ];
        
    }
    public function messages()
    {
        return [
            
            'schedule_details.1.case_desc.required'=>App::isLocale('en') ? 'Case Desc. is required':'يجب إدخال ملخص القضية',
            'schedule_details.1.case_no.required'=>App::isLocale('en') ? 'Case NO. is required':'يجب إدخال رقم القضية',
            'schedule_details.1.case_year.digits'=>App::isLocale('en') ? 'Year Not more than 4 Digits':'يجب الاتزيدالسنة عن 4اراقام ',
            'schedule_details.1.case_year.required'=>App::isLocale('en') ? ' Year is required':'يجب إدخال السنة',

            'schedule_details.*.case_desc.required'=>App::isLocale('en') ? 'Case Desc. is required':'يجب إدخال ملخص القضية',
            'schedule_details.*.case_no.required'=>App::isLocale('en') ? 'Case NO. is required':'يجب إدخال رقم القضية',
            'schedule_details.*.case_year.digits'=>App::isLocale('en') ? 'Year Not more than 4 Digits':'يجب الاتزيدالسنة عن 4اراقام ',
            'schedule_details.*.case_year.required'=>App::isLocale('en') ?  ' Year  is required':'يجب إدخال السنة',

        ];
    }
}
