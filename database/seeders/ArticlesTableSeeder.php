<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('articles')->delete();
        
        \DB::table('articles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'AR-001',
                'name' => 'Huile végetale',
                'type' => 'PF',
                'created_at' => '2024-05-08 20:01:41',
                'updated_at' => '2024-05-08 20:01:41',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'AR-002',
                'name' => 'Bouchan ',
                'type' => 'IP',
                'created_at' => '2024-05-08 20:01:41',
                'updated_at' => '2024-05-08 20:01:41',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => 'AR-003',
                'name' => 'Eau llk 1.5 ',
                'type' => 'PF',
                'created_at' => '2024-05-08 20:01:41',
                'updated_at' => '2024-05-08 20:01:41',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => 'AR-004',
                'name' => 'Etiquette llk',
                'type' => 'IP',
                'created_at' => '2024-05-08 20:01:41',
                'updated_at' => '2024-05-08 20:01:41',
            ),
            4 => 
            array (
                'id' => 5,
                'code' => 'AR-005',
                'name' => 'Eau de source',
                'type' => 'IP',
                'created_at' => '2024-05-08 20:01:41',
                'updated_at' => '2024-05-08 20:01:41',
            ),
        ));
        
        
    }
}