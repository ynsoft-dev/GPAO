<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CadencesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cadences')->delete();
        
        \DB::table('cadences')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'CA-001',
                'cadence' => 20,
                'unité' => 'plt/h',
                'atelier_id' => 1,
                'ligne_id' => 1,
                'article_id' => 1,
                'created_at' => '2024-05-08 20:26:02',
                'updated_at' => '2024-05-08 20:26:02',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'CA-002',
                'cadence' => 5,
                'unité' => 'plt/h',
                'atelier_id' => 2,
                'ligne_id' => 2,
                'article_id' => 1,
                'created_at' => '2024-05-08 20:26:28',
                'updated_at' => '2024-05-08 20:26:28',
            ),
        ));
        
        
    }
}