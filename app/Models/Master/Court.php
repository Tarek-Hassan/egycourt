<?php

namespace App\Models\Master;
use App\Models\Master\Government;
use App\Models\Master\CourtDegree;
use App\Models\Master\CircutCourtSpeciality;

use Bitwise\PermissionSeeder\PermissionSeederContract;
use Bitwise\PermissionSeeder\Traits\PermissionSeederTrait;

use Illuminate\Database\Eloquent\Model;

class Court extends Model implements PermissionSeederContract
{
    use PermissionSeederTrait;

    protected $table="courts";

    protected $guarded=[];

    public function government(){
        return $this->belongsTo(Government::class,'gov_id');
    }

    public function courtDegree(){
        return $this->belongsTo(CourtDegree::class,'court_degree_id');
    }

    public function circutCourtSpecialities(){
        return $this->hasMany(CircutCourtSpeciality::class,'court_id');
    }

}
