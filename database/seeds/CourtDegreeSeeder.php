<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Master\CourtDegree;

class CourtDegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table("court_degrees")->truncate();
      
        CourtDegree::create([
            'name_ar'=>'درجة اولي',
            'name_en'=>'First Level',

        ]);
        CourtDegree::create([
            'name_ar'=>'الاستئناف',
            'name_en'=>'Appeal',
            
        ]);
        CourtDegree::create([
            'name_ar'=>'النقض',
            'name_en'=>'Cassation',

           
        ]);
       
    }
}
