<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use App;

class CourtRequest extends FormRequest
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
            'name_ar'=>'required|regex:/^[\x{0621}-\x{064A} ]+$/u',   
            'name_en'=>'nullable|regex:/^[A-Za-z0-9 _]+$/',
            'gov_id'=>'required',
            'court_degree_id'=>'required',
        ];
        
    }
    public function messages()
    {
        return [
            'name_ar.required'=>App::isLocale('en') ? 'Arabic Name is required':'يجب إدخال اﻷسم العربى',
            'name_ar.regex'=>App::isLocale('en') ? 'Only Arabic Lang. Accepted':' يجب إدخال اﻷسم بالغة العربى',
            'name_en.regex'=>App::isLocale('en') ? 'Only English Lang. Accepted':' يجب إدخال اﻷسم بالغة الانجليزية',
            'gov_id.required'=>App::isLocale('en') ? 'Government is required':'يجب اختيار المحافظة',
            'court_degree_id.required'=>App::isLocale('en') ? 'Court Degree is required':'يجب اختيار درجة المحكمة',

        ];
    }
}
