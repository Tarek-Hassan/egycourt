<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use App;

class CircutCourtSpecialityRequest extends FormRequest
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
            'court_id'=>'required',
            'circut_id'=>'required',
            'court_specialist_id'=>'required',
            'gov_id'=>'required',
            'court_degree_id'=>'required',
        ];
        
    }
    public function messages()
    {
        return [
            'gov_id.required'=>App::isLocale('en') ? 'Government is required':'يجب اختيار المحافظة',
            'court_degree_id.required'=>App::isLocale('en') ? 'Court Degree is required':'يجب اختيار درجة المحكمة',
            'court_id.required'=>App::isLocale('en') ? 'Choose the court':'يجب اختيار المحكمة',
            'court_specialist_id.required'=>App::isLocale('en') ? 'Choose the court specialist':'يجب اختيار تخصص المحكمة',
            'court_degree_id.required'=>App::isLocale('en') ? 'Choose the court degree':'يجب اختيار درجة المحكمة',


        ];
    }
}
