<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use App\Models\Master\CourtScheduleDetail;
use App\Models\Master\CircutCourtSpeciality;
use App\User;

use Bitwise\PermissionSeeder\PermissionSeederContract;
use Bitwise\PermissionSeeder\Traits\PermissionSeederTrait;

class CourtScheduleHeader extends Model implements PermissionSeederContract
{
    use PermissionSeederTrait;

    protected $table="court_schedule_headers";

    protected $guarded=[];


    public function circutCourtSpeciality(){
        return $this->belongsTo(CircutCourtSpeciality::class,'circut_court_speciality_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'created_by');
    }
    public function courtScheduleDetails(){
        return $this->hasMany(CourtScheduleDetail::class,'court_schedule_header_id');
    }

}