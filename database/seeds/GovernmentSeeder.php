<?php

use App\Models\Master\Government;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GovernmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('governments')->truncate();

        Government::create([
            'name_ar'=>'القاهرة',
            'name_en'=>'Cairo',
        ]); 
          Government::create([
            'name_ar'=>'الجيزة',
            'name_en'=>'Giza',
        ]);
        Government::create([
            'name_ar'=>'الأسكندرية',
            'name_en'=>'Alexandria',
        ]);  Government::create([
            'name_ar'=>'الدقهلية',
            'name_en'=>'Dakahlia',
        ]);
        Government::create([
            'name_ar'=>'البحر الأحمر',
            'name_en'=>'Red Sea',
        ]);
        Government::create([
            'name_ar'=>'البحيرة',
            'name_en'=>'Beheira',
        ]);
        Government::create([
            'name_ar'=>'الفيوم',
            'name_en'=>'Fayoum',
        ]); 
        Government::create([
            'name_ar'=>'الغربية',
            'name_en'=>'Gharbiya',
        ]);
        Government::create([
            'name_ar'=>'الإسماعلية',
            'name_en'=>'Ismailia',
        ]);
        Government::create([
            'name_ar'=>'المنوفية',
            'name_en'=>'Monofia',
        ]);

       
    }
}
