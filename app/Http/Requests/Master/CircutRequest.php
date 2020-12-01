<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use App;

class CircutRequest extends FormRequest
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
            'year'=>'required|digits:4',
            'circut_no'=>'required',
            'court_id'=>'required',

        ];
        
    }
    public function messages()
    {
        return [
            'year.digits'=>App::isLocale('en') ? 'Year Not more than 4 Digits':'يجب الاتزيدالسنة عن 4اراقام ',
            'year.required'=>App::isLocale('en') ? 'Insert The Year':'ادخل السنة',
            'circut_no.required'=>App::isLocale('en') ? 'Insert the circle Number':'ادخل رقم الدائرة',
            'court_id.required'=>App::isLocale('en') ? 'Choose the court':'ادخل اسم المحكمة',

        ];
    }
}
