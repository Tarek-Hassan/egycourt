<?php

namespace App\Models\Master;

use App\Models\Master\Court;
use App\Models\Master\Circut;
use App\Models\Master\CourtSpecialist;

use Illuminate\Database\Eloquent\Model;

use Bitwise\PermissionSeeder\PermissionSeederContract;
use Bitwise\PermissionSeeder\Traits\PermissionSeederTrait;

class CircutCourtSpeciality extends Model  implements PermissionSeederContract
{   
    use PermissionSeederTrait;

    protected $table="circut_court_specialities";

    protected $fillable=['court_id','circut_id','court_specialist_id','is_active'];
    // protected $guarded=[];

    public function court(){
        return $this->belongsTo(Court::class,'court_id');
    }
    public function circut(){
        return $this->belongsTo(Circut::class,'circut_id');
    }
    public function courtSpecialist(){
        return $this->belongsTo(CourtSpecialist::class,'court_specialist_id');
    }
    //
}
