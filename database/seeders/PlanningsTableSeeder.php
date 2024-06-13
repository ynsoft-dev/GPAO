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
                'date' => '2024-06-05',
                'équipe' => 'A',
                'quart' => 12,
                'atelier_id' => 1,
                'created_at' => '2024-06-12 18:42:44',
                'updated_at' => '2024-06-12 18:42:44',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'PL-002',
                'date' => '2024-06-13',
                'équipe' => 'A',
                'quart' => 8,
                'atelier_id' => 2,
                'created_at' => '2024-06-12 18:52:13',
                'updated_at' => '2024-06-12 18:52:13',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => 'PL-003',
                'date' => '2024-06-15',
                'équipe' => 'B',
                'quart' => 12,
                'atelier_id' => 3,
                'created_at' => '2024-06-12 18:52:23',
                'updated_at' => '2024-06-12 18:52:23',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => 'PL-004',
                'date' => '2024-06-21',
                'équipe' => 'B',
                'quart' => 8,
                'atelier_id' => 2,
                'created_at' => '2024-06-12 18:52:44',
                'updated_at' => '2024-06-12 18:52:44',
            ),
            4 => 
            array (
                'id' => 5,
                'code' => 'PL-005',
                'date' => '2024-06-22',
                'équipe' => 'C',
                'quart' => 16,
                'atelier_id' => 4,
                'created_at' => '2024-06-12 19:10:57',
                'updated_at' => '2024-06-12 19:10:57',
            ),
            5 => 
            array (
                'id' => 6,
                'code' => 'PL-006',
                'date' => '2024-06-23',
                'équipe' => 'B',
                'quart' => 8,
                'atelier_id' => 5,
                'created_at' => '2024-06-12 19:11:13',
                'updated_at' => '2024-06-12 19:11:13',
            ),
        ));
        
        
    }
}