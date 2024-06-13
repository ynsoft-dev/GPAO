<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LignesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('lignes')->delete();
        
        \DB::table('lignes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'LI-001',
                'name' => 'Ligne 1',
                'atelier_id' => 1,
                'created_at' => '2024-06-01 21:02:31',
                'updated_at' => '2024-06-01 21:02:31',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'LI-002',
                'name' => 'Ligne 2',
                'atelier_id' => 1,
                'created_at' => '2024-06-01 21:02:38',
                'updated_at' => '2024-06-01 21:02:38',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => 'LI-003',
                'name' => 'Ligne 1',
                'atelier_id' => 2,
                'created_at' => '2024-06-01 21:02:47',
                'updated_at' => '2024-06-01 21:02:47',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => 'LI-004',
                'name' => 'Ligne 2',
                'atelier_id' => 2,
                'created_at' => '2024-06-01 21:02:54',
                'updated_at' => '2024-06-01 21:02:54',
            ),
            4 => 
            array (
                'id' => 5,
                'code' => 'LI-005',
                'name' => 'Ligne 1',
                'atelier_id' => 3,
                'created_at' => '2024-06-01 21:03:05',
                'updated_at' => '2024-06-01 21:03:05',
            ),
            5 => 
            array (
                'id' => 6,
                'code' => 'LI-006',
                'name' => 'Ligne 2',
                'atelier_id' => 3,
                'created_at' => '2024-06-01 21:03:16',
                'updated_at' => '2024-06-01 21:03:16',
            ),
            6 => 
            array (
                'id' => 7,
                'code' => 'LI-007',
                'name' => 'Ligne 3',
                'atelier_id' => 3,
                'created_at' => '2024-06-01 21:03:28',
                'updated_at' => '2024-06-01 21:03:28',
            ),
            7 => 
            array (
                'id' => 8,
                'code' => 'LI-008',
                'name' => 'Ligne 1',
                'atelier_id' => 4,
                'created_at' => '2024-06-01 21:03:39',
                'updated_at' => '2024-06-01 21:03:39',
            ),
            8 => 
            array (
                'id' => 9,
                'code' => 'LI-009',
                'name' => 'Ligne 2',
                'atelier_id' => 4,
                'created_at' => '2024-06-01 21:03:47',
                'updated_at' => '2024-06-01 21:03:47',
            ),
            9 => 
            array (
                'id' => 10,
                'code' => 'LI-010',
                'name' => 'Ligne 3',
                'atelier_id' => 4,
                'created_at' => '2024-06-01 21:03:59',
                'updated_at' => '2024-06-01 21:03:59',
            ),
            10 => 
            array (
                'id' => 11,
                'code' => 'LI-011',
                'name' => 'Ligne 1',
                'atelier_id' => 5,
                'created_at' => '2024-06-01 21:04:12',
                'updated_at' => '2024-06-01 21:04:12',
            ),
        ));
        
        
    }
}