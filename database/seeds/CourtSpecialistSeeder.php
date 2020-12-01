<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


use App\Models\Master\CourtSpecialist;

class CourtSpecialistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('court_specialists')->truncate();

        CourtSpecialist::create([
            'name_ar'=>'مدني',
            'name_en'=>'Civil',
        ]);

        CourtSpecialist::create([
            'name_ar'=>'اسرة',
            'name_en'=>'Family',
        ]);

        CourtSpecialist::create([
            'name_ar'=>'جنح/جنايات',
            'name_en'=>'Misdemeanor/felony',
        ]);


       
    }
}
