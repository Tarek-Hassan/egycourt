<?php

namespace App\Models\Master;

use App\Models\Master\Court;

use Illuminate\Database\Eloquent\Model;

class CourtSpecialist extends Model
{
    protected $table="court_specialists";

    protected $guarded=[];

    public function circutCourtSpecialities(){
        return $this->hasMany(CircutCourtSpeciality::class,'court_Specialist_id');
    }
}
