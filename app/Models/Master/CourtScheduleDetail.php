<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Models\Master\CourtScheduleHeader;

use Bitwise\PermissionSeeder\PermissionSeederContract;
use Bitwise\PermissionSeeder\Traits\PermissionSeederTrait;

class CourtScheduleDetail extends Model implements PermissionSeederContract
{
    use PermissionSeederTrait;

    protected $table="court_schedule_details";

    protected $fillable=['case_year','case_no','case_desc','order','court_schedule_header_id','created_by','schedule_status_id'];


    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function courtScheduleDetail(){
        return $this->belongsTo(CourtScheduleHeader::class,'court_schedule_header_id');
    }
}