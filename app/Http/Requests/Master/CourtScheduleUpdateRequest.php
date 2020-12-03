<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use App;

class CourtScheduleUpdateRequest extends FormRequest
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

            'schedule_details_update.*.case_year'=>'required|digits:4',
            'schedule_details_update.*.case_no'=>'required',
            'schedule_details_update.*.case_desc'=>'required',
            'case_date'=>'required',
            'role_no'=>'required',
            'court_speciality_id'=>'required',
            'court_id'=>'required',
            'circut_id'=>'required',
        ];
        
    }
    public function messages()
    {
        return [
            
            'schedule_details_update.*.case_desc.required'=>App::isLocale('en') ? 'Case Desc. is required':'يجب إدخال ملخص القضية',
            'schedule_details_update.*.case_no.required'=>App::isLocale('en') ? 'Case NO. is required':'يجب إدخال رقم القضية',
            'schedule_details_update.*.case_year.digits'=>App::isLocale('en') ? 'Year Not more than 4 Digits':'يجب الاتزيدالسنة عن 4اراقام ',
            'schedule_details_update.*.case_year.required'=>App::isLocale('en') ?  ' Year  is required':'يجب إدخال السنة',
            'case_date.required'=>App::isLocale('en') ? 'Case Date is required':'يجب إدخال تاريخ القضية',
            'role_no.required'=>App::isLocale('en') ? 'Role NO. is required':'يجب إدخال رقم الرول',
            'court_speciality_id.required'=>App::isLocale('en') ? 'Court Speciality is required':'يجب اختيار تخصص المحكمة',
            'court_id.required'=>App::isLocale('en') ? 'Court is required':'يجب اختيار  المحكمة',
            'circut_id.required'=>App::isLocale('en') ? 'Circut is required':'يجب اختيار الدائرة',

        ];
    }
}
