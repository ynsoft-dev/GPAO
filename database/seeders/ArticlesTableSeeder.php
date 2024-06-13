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
                'created_at' => '2024-06-01 20:55:09',
                'updated_at' => '2024-06-01 20:55:09',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'AR-002',
                'name' => 'Eau LLK 1.5',
                'type' => 'PF',
                'created_at' => '2024-06-01 20:55:26',
                'updated_at' => '2024-06-01 20:55:26',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => 'AR-003',
                'name' => 'Eau source',
                'type' => 'IP',
                'created_at' => '2024-06-01 20:55:38',
                'updated_at' => '2024-06-01 21:04:53',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => 'AR-004',
                'name' => 'Bouchan',
                'type' => 'IP',
                'created_at' => '2024-06-01 20:56:27',
                'updated_at' => '2024-06-01 20:56:27',
            ),
            4 => 
            array (
                'id' => 5,
                'code' => 'AR-005',
                'name' => 'Plastique pet',
                'type' => 'IP',
                'created_at' => '2024-06-01 20:56:57',
                'updated_at' => '2024-06-01 20:56:57',
            ),
            5 => 
            array (
                'id' => 6,
                'code' => 'AR-006',
                'name' => 'Etiquette',
                'type' => 'IP',
                'created_at' => '2024-06-01 20:57:17',
                'updated_at' => '2024-06-01 20:57:17',
            ),
            6 => 
            array (
                'id' => 7,
                'code' => 'AR-007',
                'name' => 'Acide oléique',
                'type' => 'IP',
                'created_at' => '2024-06-01 20:57:31',
                'updated_at' => '2024-06-01 20:57:31',
            ),
            7 => 
            array (
                'id' => 8,
                'code' => 'AR-008',
                'name' => 'Acide linoléique',
                'type' => 'IP',
                'created_at' => '2024-06-01 20:57:41',
                'updated_at' => '2024-06-01 20:57:41',
            ),
            8 => 
            array (
                'id' => 9,
                'code' => 'AR-009',
                'name' => 'Sceau de sécurité',
                'type' => 'IP',
                'created_at' => '2024-06-01 20:58:15',
                'updated_at' => '2024-06-01 20:58:15',
            ),
            9 => 
            array (
                'id' => 10,
                'code' => 'AR-010',
                'name' => 'Jus 1L',
                'type' => 'PF',
                'created_at' => '2024-06-01 20:59:07',
                'updated_at' => '2024-06-01 20:59:07',
            ),
            10 => 
            array (
                'id' => 11,
                'code' => 'AR-011',
                'name' => 'Pulpe d\'orange',
                'type' => 'IP',
                'created_at' => '2024-06-01 20:59:19',
                'updated_at' => '2024-06-01 20:59:19',
            ),
            11 => 
            array (
                'id' => 12,
                'code' => 'AR-012',
                'name' => 'Conservateur alimentaire',
                'type' => 'IP',
                'created_at' => '2024-06-01 20:59:31',
                'updated_at' => '2024-06-01 20:59:31',
            ),
            12 => 
            array (
                'id' => 13,
                'code' => 'AR-013',
                'name' => 'Aromes',
                'type' => 'IP',
                'created_at' => '2024-06-01 20:59:53',
                'updated_at' => '2024-06-01 20:59:53',
            ),
            13 => 
            array (
                'id' => 14,
                'code' => 'AR-014',
                'name' => 'Mayonnaise',
                'type' => 'PF',
                'created_at' => '2024-06-01 21:00:06',
                'updated_at' => '2024-06-01 21:00:06',
            ),
            14 => 
            array (
                'id' => 15,
                'code' => 'AR-015',
                'name' => 'Moutarde',
                'type' => 'IP',
                'created_at' => '2024-06-01 21:00:17',
                'updated_at' => '2024-06-01 21:00:17',
            ),
            15 => 
            array (
                'id' => 16,
                'code' => 'AR-016',
                'name' => 'Sel',
                'type' => 'IP',
                'created_at' => '2024-06-01 21:00:39',
                'updated_at' => '2024-06-01 21:00:39',
            ),
            16 => 
            array (
                'id' => 17,
                'code' => 'AR-017',
                'name' => 'Vinaigrette',
                'type' => 'PF',
                'created_at' => '2024-06-01 21:00:56',
                'updated_at' => '2024-06-01 21:00:56',
            ),
            17 => 
            array (
                'id' => 18,
                'code' => 'AR-018',
                'name' => 'Vinaigre',
                'type' => 'IP',
                'created_at' => '2024-06-01 21:01:07',
                'updated_at' => '2024-06-01 21:01:07',
            ),
            18 => 
            array (
                'id' => 19,
                'code' => 'AR-019',
                'name' => 'Huiles essentielles',
                'type' => 'IP',
                'created_at' => '2024-06-01 21:01:23',
                'updated_at' => '2024-06-01 21:01:23',
            ),
            19 => 
            array (
                'id' => 20,
                'code' => 'AR-020',
                'name' => 'Sucre roux',
                'type' => 'IP',
                'created_at' => '2024-06-12 23:19:46',
                'updated_at' => '2024-06-12 23:19:46',
            ),
            20 => 
            array (
                'id' => 21,
                'code' => 'AR-021',
                'name' => 'Sucre roux 1KG',
                'type' => 'PF',
                'created_at' => '2024-06-12 23:20:00',
                'updated_at' => '2024-06-12 23:20:00',
            ),
            21 => 
            array (
                'id' => 22,
                'code' => 'AR-022',
                'name' => 'Sucre blanc 1KG',
                'type' => 'PF',
                'created_at' => '2024-06-12 23:20:13',
                'updated_at' => '2024-06-12 23:20:13',
            ),
            22 => 
            array (
                'id' => 23,
                'code' => 'AR-023',
                'name' => 'Choux',
                'type' => 'IP',
                'created_at' => '2024-06-12 23:20:25',
                'updated_at' => '2024-06-12 23:20:25',
            ),
            23 => 
            array (
                'id' => 24,
                'code' => 'AR-024',
                'name' => 'Sac plastique',
                'type' => 'IP',
                'created_at' => '2024-06-12 23:20:47',
                'updated_at' => '2024-06-12 23:20:47',
            ),
        ));
        
        
    }
}