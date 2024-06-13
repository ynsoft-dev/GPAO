<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AteliersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ateliers')->delete();
        
        \DB::table('ateliers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'AT-001',
                'name' => 'Atelier 1',
                'created_at' => '2024-04-27 20:13:00',
                'updated_at' => '2024-06-01 21:01:51',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'AT-002',
                'name' => 'Atelier 2',
                'created_at' => '2024-04-27 20:13:05',
                'updated_at' => '2024-06-01 21:01:58',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => 'AT-003',
                'name' => 'Atelier 3',
                'created_at' => '2024-04-27 20:13:05',
                'updated_at' => '2024-06-01 21:02:04',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => 'AT-004',
                'name' => 'Atelier 4',
                'created_at' => '2024-04-27 20:13:05',
                'updated_at' => '2024-06-01 21:02:11',
            ),
            4 => 
            array (
                'id' => 5,
                'code' => 'AT-005',
                'name' => 'Atelier 5',
                'created_at' => '2024-04-27 20:13:05',
                'updated_at' => '2024-06-01 21:02:17',
            ),
        ));
        
        
    }
}