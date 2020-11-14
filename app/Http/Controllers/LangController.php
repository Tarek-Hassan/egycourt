<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function change($name){
        App::setLocale($name);
        Session::put('locale', $name );
        return redirect()->back();
    }
}
