<?php

namespace App\Models\Master;

use App\Models\Master\Court;

use Illuminate\Database\Eloquent\Model;

class CourtDegree extends Model
{
    protected $table="court_degrees";

    protected $guarded=[];

    public function courts(){
        return $this->hasMany(Court::class,'gov_id');
    }
}
