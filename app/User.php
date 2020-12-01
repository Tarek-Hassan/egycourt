<?php

namespace App;

use App\Models\Master\Company;
use App\Models\Master\Service\MarketSegment;
use App\Models\ViewModel\RootMenuNode;
use App\Traits\HasFilter;
use Bitwise\PermissionSeeder\PermissionSeederContract;
use Bitwise\PermissionSeeder\Traits\PermissionSeederTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Laratrust\Traits\LaratrustUserTrait;

use App\Models\Master\Court;
use App\Models\Master\Circut;

class User extends Authenticatable implements PermissionSeederContract
{
    use LaratrustUserTrait;
    use Notifiable,PermissionSeederTrait,HasFilter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        "is_super_admin"=>"boolean"
    ];

    public function companies(){
        return $this->belongsToMany(Company::class,'company_users','user_id','company_id');
    }

    public function marketSegments(){
        return $this->belongsToMany(MarketSegment::class,'market_segment_users','user_id','market_segment_id');
    }

    public function getAvatarUrl(){
        if(is_null($this->avatar)){
            return asset('assets/img/profile.png');
        }
        return asset('storage/'.$this->avatar);
    }

    public function getMenu(){
        $key = "rootMenu:".$this->id;
        $rootMenu = Cache::remember($key,60*60, function () {
            return new RootMenuNode();
        });
        return $rootMenu;
    }

    public function getCompanies(){
        $key = "companies:".$this->id;
        $data= Cache::remember($key,60*60, function () {
            if($this->is_super_admin){
               return Company::orderBy('name')->get();
            }else{
                return $this->companies()->orderBy('name')->get();
            }
        });
        return $data;
    }

    public function clearCache(){
        $this->clearCompanies();
        $this->clearMenu();
    }
    public function clearCompanies(){
        $key = "companies:".$this->id;
        Cache::forget($key);
    }
    public function clearMenu(){
        $key = "rootMenu:".$this->id;
        Cache::forget($key);
    }

    
    public function court(){
        return $this->belongsTo(Court::class,'court_id');
    }
    public function circut(){
        return $this->belongsTo(Circut::class,'circut_id');
    }
}
