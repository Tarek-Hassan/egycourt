<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Company;
use App\Models\Master\Country;
use App\Models\Master\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index(){
        $this->authorize(__FUNCTION__,Company::class);
        $companies = Company::orderBy('name')->with('country')->paginate(30);
        return view('master.company.index',[
            'items'=>$companies
        ]);
    }
    public function show(Company $company){
        $this->authorize(__FUNCTION__,Company::class);
        $company = $company->load('country');
        return view('master.company.show',[
            'company'=>$company,
        ]);
    }
    public function create(){
        $this->authorize(__FUNCTION__,Company::class);
        $countries = Country::orderBy('name')->get();
        $currencies = Currency::where('is_active',1)->get();
        return view('master.company.create',[
            'countries'=>$countries,
            'currencies'=>$currencies
        ]);
    }

    public function store(Request $request){
        $this->authorize(__FUNCTION__,Company::class);
        $this->validate($request,$this->rules());
        $company = Company::create($request->except('_token','currencies'));
        $company->currencies()->sync($request->input('currencies',[]));
        Auth::user()->clearCache();
        return redirect()->route('company.index')->with('success',trans('company.created'));
    }

    public function edit(Company $company){
        $this->authorize(__FUNCTION__,Company::class);
        $company = $company->load('country','currencies');
        $countries = Country::orderBy('name')->get();
        $currencies = Currency::where('is_active',1)->get();
        return view('master.company.edit',[
            'company'=>$company,
            'countries'=>$countries,
            'currencies'=>$currencies
        ]);
    }

    public function update(Request $request,Company $company){
        $this->authorize(__FUNCTION__,Company::class);
        $this->validate($request,$this->rules(true,$company));
        $company->update($request->except('_token','currencies'));
        $company->currencies()->sync($request->input('currencies',[]));
        Auth::user()->clearCache();
        return redirect()->route('company.index')->with('success',trans('company.updated'));
    }

    protected function rules($is_update = false,$model = null){
        $rules =  [
            'name'=>'required|unique:companies,name',
            'email'=>'nullable|email',
            'currencies'=>'required',
            'main_currency_id'=>'required'
        ];
        if($is_update){
            $rules = array_merge($rules, [
                'name'=>'required|unique:companies,name,'.$model->id,
            ]);
        }
        return $rules;
    }
}
