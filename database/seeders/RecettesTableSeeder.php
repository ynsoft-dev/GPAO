<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RecettesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('recettes')->delete();
        
        \DB::table('recettes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'article_pf_id' => 1,
                'article_ip_id' => 4,
                'quantité' => 1,
                'unité' => 'rouleau',
                'created_at' => '2024-05-08 20:17:12',
                'updated_at' => '2024-05-08 20:17:12',
            ),
            1 => 
            array (
                'id' => 2,
                'article_pf_id' => 3,
                'article_ip_id' => 4,
                'quantité' => 1,
                'unité' => 'rouleau',
                'created_at' => '2024-05-08 20:17:31',
                'updated_at' => '2024-05-08 20:17:31',
            ),
            2 => 
            array (
                'id' => 3,
                'article_pf_id' => 3,
                'article_ip_id' => 5,
                'quantité' => 1.5,
                'unité' => 'litre',
                'created_at' => '2024-05-08 20:18:29',
                'updated_at' => '2024-05-08 20:18:29',
            ),
        ));
        
        
    }
}