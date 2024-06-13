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
                'unité' => 'Bouteilles/heure',
                'atelier_id' => 1,
                'ligne_id' => 1,
                'article_id' => 1,
                'created_at' => '2024-06-12 18:29:39',
                'updated_at' => '2024-06-12 18:29:39',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'CA-002',
                'cadence' => 25,
                'unité' => 'Bouteilles/heure',
                'atelier_id' => 2,
                'ligne_id' => 4,
                'article_id' => 2,
                'created_at' => '2024-06-12 18:31:59',
                'updated_at' => '2024-06-12 18:31:59',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => 'CA-003',
                'cadence' => 35,
                'unité' => 'Bouteilles/heure',
                'atelier_id' => 3,
                'ligne_id' => 5,
                'article_id' => 10,
                'created_at' => '2024-06-12 18:32:20',
                'updated_at' => '2024-06-12 18:32:20',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => 'CA-004',
                'cadence' => 26,
                'unité' => 'pots/heure',
                'atelier_id' => 4,
                'ligne_id' => 8,
                'article_id' => 14,
                'created_at' => '2024-06-12 18:33:24',
                'updated_at' => '2024-06-12 18:33:24',
            ),
            4 => 
            array (
                'id' => 5,
                'code' => 'CA-005',
                'cadence' => 30,
                'unité' => 'Bouteilles',
                'atelier_id' => 4,
                'ligne_id' => 9,
                'article_id' => 17,
                'created_at' => '2024-06-12 18:34:07',
                'updated_at' => '2024-06-12 18:34:07',
            ),
        ));
        
        
    }
}