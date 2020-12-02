<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;
class SuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('is_super_admin',1)->first();
        if(is_null($user)){
            User::create([
                'name'=>'sys_admin',
                'full_name'=>'System Admin',
                'password'=>Hash::make(123456),
                'is_active'=>1,
                'circut_id'=>1,
                'court_id'=>1,
                'is_super_admin'=>1,
                'uuid_code'=>Str::uuid(),
            ]);
        }
    }
}
