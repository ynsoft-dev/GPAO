<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PlanningsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('plannings')->delete();
        
        \DB::table('plannings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'PL-001',
                'date' => '2024-05-08',
                'équipe' => 'A',
                'quart' => '8',
                'atelier_id' => 1,
                'created_at' => '2024-05-08 20:30:07',
                'updated_at' => '2024-05-08 20:30:07',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'PL-002',
                'date' => '2024-05-08',
                'équipe' => 'B',
                'quart' => '12',
                'atelier_id' => 1,
                'created_at' => '2024-05-08 20:30:38',
                'updated_at' => '2024-05-08 20:30:38',
            ),
        ));
        
        
    }
}