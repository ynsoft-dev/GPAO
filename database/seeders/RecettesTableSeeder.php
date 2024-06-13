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
                'code' => 'RC-001',
                'article_pf_id' => 1,
                'article_ip_id' => 4,
                'quantité' => 1,
                'unité' => 'Bouchan',
                'created_at' => '2024-06-03 09:19:39',
                'updated_at' => '2024-06-03 09:19:39',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'RC-002',
                'article_pf_id' => 1,
                'article_ip_id' => 5,
                'quantité' => 1,
                'unité' => 'Bouteille',
                'created_at' => '2024-06-03 09:20:14',
                'updated_at' => '2024-06-03 09:20:14',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => 'RC-003',
                'article_pf_id' => 1,
                'article_ip_id' => 6,
                'quantité' => 10,
                'unité' => 'Cm',
                'created_at' => '2024-06-12 18:12:37',
                'updated_at' => '2024-06-12 18:15:08',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => 'RC-004',
                'article_pf_id' => 1,
                'article_ip_id' => 7,
                'quantité' => 250,
                'unité' => 'G',
                'created_at' => '2024-06-12 18:12:55',
                'updated_at' => '2024-06-12 18:12:55',
            ),
            4 => 
            array (
                'id' => 5,
                'code' => 'RC-005',
                'article_pf_id' => 1,
                'article_ip_id' => 8,
                'quantité' => 320,
                'unité' => 'G',
                'created_at' => '2024-06-12 18:13:11',
                'updated_at' => '2024-06-12 18:13:11',
            ),
            5 => 
            array (
                'id' => 6,
                'code' => 'RC-006',
                'article_pf_id' => 2,
                'article_ip_id' => 3,
                'quantité' => 1.5,
                'unité' => 'L',
                'created_at' => '2024-06-12 18:14:05',
                'updated_at' => '2024-06-12 18:14:05',
            ),
            6 => 
            array (
                'id' => 7,
                'code' => 'RC-007',
                'article_pf_id' => 2,
                'article_ip_id' => 4,
                'quantité' => 1,
                'unité' => 'Bouchan',
                'created_at' => '2024-06-12 18:14:19',
                'updated_at' => '2024-06-12 18:14:19',
            ),
            7 => 
            array (
                'id' => 8,
                'code' => 'RC-008',
                'article_pf_id' => 2,
                'article_ip_id' => 5,
                'quantité' => 1,
                'unité' => 'Bouteille',
                'created_at' => '2024-06-12 18:14:40',
                'updated_at' => '2024-06-12 18:14:40',
            ),
            8 => 
            array (
                'id' => 9,
                'code' => 'RC-009',
                'article_pf_id' => 2,
                'article_ip_id' => 6,
                'quantité' => 10,
                'unité' => 'Cm',
                'created_at' => '2024-06-12 18:15:00',
                'updated_at' => '2024-06-12 18:15:00',
            ),
            9 => 
            array (
                'id' => 10,
                'code' => 'RC-010',
                'article_pf_id' => 10,
                'article_ip_id' => 3,
                'quantité' => 700,
                'unité' => 'Ml',
                'created_at' => '2024-06-12 18:16:31',
                'updated_at' => '2024-06-12 18:16:31',
            ),
            10 => 
            array (
                'id' => 11,
                'code' => 'RC-011',
                'article_pf_id' => 10,
                'article_ip_id' => 9,
                'quantité' => 1,
                'unité' => 'Sceau',
                'created_at' => '2024-06-12 18:16:56',
                'updated_at' => '2024-06-12 18:16:56',
            ),
            11 => 
            array (
                'id' => 12,
                'code' => 'RC-012',
                'article_pf_id' => 10,
                'article_ip_id' => 11,
                'quantité' => 100,
                'unité' => 'G',
                'created_at' => '2024-06-12 18:17:20',
                'updated_at' => '2024-06-12 18:17:20',
            ),
            12 => 
            array (
                'id' => 13,
                'code' => 'RC-013',
                'article_pf_id' => 10,
                'article_ip_id' => 13,
                'quantité' => 100,
                'unité' => 'Ml',
                'created_at' => '2024-06-12 18:17:37',
                'updated_at' => '2024-06-12 18:17:37',
            ),
            13 => 
            array (
                'id' => 14,
                'code' => 'RC-014',
                'article_pf_id' => 10,
                'article_ip_id' => 12,
                'quantité' => 100,
                'unité' => 'Ml',
                'created_at' => '2024-06-12 18:18:00',
                'updated_at' => '2024-06-12 18:18:00',
            ),
            14 => 
            array (
                'id' => 15,
                'code' => 'RC-015',
                'article_pf_id' => 14,
                'article_ip_id' => 6,
                'quantité' => 10,
                'unité' => 'Cm',
                'created_at' => '2024-06-12 18:18:23',
                'updated_at' => '2024-06-12 18:18:23',
            ),
            15 => 
            array (
                'id' => 16,
                'code' => 'RC-016',
                'article_pf_id' => 14,
                'article_ip_id' => 12,
                'quantité' => 100,
                'unité' => 'G',
                'created_at' => '2024-06-12 18:18:41',
                'updated_at' => '2024-06-12 18:18:41',
            ),
            16 => 
            array (
                'id' => 17,
                'code' => 'RC-017',
                'article_pf_id' => 14,
                'article_ip_id' => 15,
                'quantité' => 80,
                'unité' => 'G',
                'created_at' => '2024-06-12 18:19:05',
                'updated_at' => '2024-06-12 18:19:05',
            ),
            17 => 
            array (
                'id' => 18,
                'code' => 'RC-018',
                'article_pf_id' => 14,
                'article_ip_id' => 16,
                'quantité' => 5,
                'unité' => 'G',
                'created_at' => '2024-06-12 18:19:21',
                'updated_at' => '2024-06-12 18:19:21',
            ),
            18 => 
            array (
                'id' => 19,
                'code' => 'RC-019',
                'article_pf_id' => 17,
                'article_ip_id' => 4,
                'quantité' => 1,
                'unité' => 'Bouchan',
                'created_at' => '2024-06-12 18:19:53',
                'updated_at' => '2024-06-12 18:19:53',
            ),
            19 => 
            array (
                'id' => 20,
                'code' => 'RC-020',
                'article_pf_id' => 17,
                'article_ip_id' => 6,
                'quantité' => 10,
                'unité' => 'Cm',
                'created_at' => '2024-06-12 18:20:06',
                'updated_at' => '2024-06-12 18:20:06',
            ),
            20 => 
            array (
                'id' => 21,
                'code' => 'RC-021',
                'article_pf_id' => 17,
                'article_ip_id' => 12,
                'quantité' => 100,
                'unité' => 'Ml',
                'created_at' => '2024-06-12 18:20:22',
                'updated_at' => '2024-06-12 18:20:22',
            ),
            21 => 
            array (
                'id' => 22,
                'code' => 'RC-022',
                'article_pf_id' => 17,
                'article_ip_id' => 16,
                'quantité' => 5,
                'unité' => 'G',
                'created_at' => '2024-06-12 18:20:40',
                'updated_at' => '2024-06-12 18:20:40',
            ),
            22 => 
            array (
                'id' => 23,
                'code' => 'RC-023',
                'article_pf_id' => 17,
                'article_ip_id' => 19,
                'quantité' => 100,
                'unité' => 'Ml',
                'created_at' => '2024-06-12 18:20:59',
                'updated_at' => '2024-06-12 18:20:59',
            ),
            23 => 
            array (
                'id' => 24,
                'code' => 'RC-024',
                'article_pf_id' => 1,
                'article_ip_id' => 9,
                'quantité' => 1,
                'unité' => 'Sceau',
                'created_at' => '2024-06-12 18:21:13',
                'updated_at' => '2024-06-12 18:21:13',
            ),
            24 => 
            array (
                'id' => 25,
                'code' => 'RC-025',
                'article_pf_id' => 17,
                'article_ip_id' => 15,
                'quantité' => 40,
                'unité' => 'G',
                'created_at' => '2024-06-12 18:21:34',
                'updated_at' => '2024-06-12 18:21:34',
            ),
        ));
        
        
    }
}