<?php

namespace App\Models\Master;
use App\Models\Master\Court;
use App\Models\Master\CircutCourtSpeciality;
use App\Models\Master\CourtScheduleHeader;


use Bitwise\PermissionSeeder\PermissionSeederContract;
use Bitwise\PermissionSeeder\Traits\PermissionSeederTrait;

use Illuminate\Database\Eloquent\Model;

class Circut extends Model  implements PermissionSeederContract
{
    use PermissionSeederTrait;

    protected $table="circuts";

    protected $guarded=[];

    public function court(){
        return $this->belongsTo(Court::class,'court_id');
    }
    
    public function circutCourtSpecialities(){
        return $this->hasMany(CircutCourtSpeciality::class,'circut_id');
    }
    public function courtScheduleHeaders(){
        return $this->hasMany(CourtScheduleHeader::class,'circut_id');
    }
}
