<?php

namespace App\Models\Master;

use App\Models\Master\Court;
use Illuminate\Database\Eloquent\Model;

class Government extends Model
{
    protected $table="governments";

    protected $guarded=[];

    public function courts(){
        return $this->hasMany(Court::class,'gov_id');
    }
}
