<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArretsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('arrets')->delete();
        
        \DB::table('arrets')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'Arr-001',
                'masqué' => 0,
                'duration' => 10,
                'famille' => 'Qualité',
                'sfamille' => 'Non-conformité des produits',
                'class' => 'Contrôle qualité',
                'impact' => '60%',
                'production_id' => 1,
                'created_at' => '2024-06-12 19:49:21',
                'updated_at' => '2024-06-12 19:49:21',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'Arr-002',
                'masqué' => 0,
                'duration' => 12,
                'famille' => 'Technique',
                'sfamille' => 'Maintenance préventive',
                'class' => 'Maintenance',
                'impact' => '50%',
                'production_id' => 2,
                'created_at' => '2024-06-12 19:50:09',
                'updated_at' => '2024-06-12 19:50:09',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => 'Arr-003',
                'masqué' => 0,
                'duration' => 10,
                'famille' => 'Qualité',
                'sfamille' => 'Non-conformité des produits',
                'class' => 'Contrôle qualité',
                'impact' => '60%',
                'production_id' => 3,
                'created_at' => '2024-06-12 21:30:33',
                'updated_at' => '2024-06-12 21:30:33',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => 'Arr-004',
                'masqué' => 0,
                'duration' => 8,
                'famille' => 'Qualité',
                'sfamille' => 'Non-conformité des produits',
                'class' => 'Contrôle qualité',
                'impact' => '60%',
                'production_id' => 4,
                'created_at' => '2024-06-12 21:30:56',
                'updated_at' => '2024-06-12 21:30:56',
            ),
            4 => 
            array (
                'id' => 5,
                'code' => 'Arr-005',
                'masqué' => 0,
                'duration' => 40,
                'famille' => 'organisationnel',
                'sfamille' => 'Manifestation des employés',
                'class' => 'Opérations',
                'impact' => '90%',
                'production_id' => 30,
                'created_at' => '2024-06-12 23:06:28',
                'updated_at' => '2024-06-12 23:06:28',
            ),
            5 => 
            array (
                'id' => 6,
                'code' => 'Arr-006',
                'masqué' => 0,
                'duration' => 30,
                'famille' => 'organisationnel',
                'sfamille' => 'gréve du personnelle',
                'class' => 'ressource humaine',
                'impact' => '100%',
                'production_id' => 31,
                'created_at' => '2024-06-12 23:06:59',
                'updated_at' => '2024-06-12 23:07:06',
            ),
            6 => 
            array (
                'id' => 7,
                'code' => 'Arr-007',
                'masqué' => 0,
                'duration' => 30,
                'famille' => 'organisationnel',
                'sfamille' => 'gréve du personnelle',
                'class' => 'ressource humaine',
                'impact' => '100%',
                'production_id' => 32,
                'created_at' => '2024-06-12 23:07:26',
                'updated_at' => '2024-06-12 23:07:26',
            ),
            7 => 
            array (
                'id' => 8,
                'code' => 'Arr-008',
                'masqué' => 1,
                'duration' => 10,
                'famille' => 'Qualité',
                'sfamille' => 'Non-conformité des produits',
                'class' => 'ressource humaine',
                'impact' => '100%',
                'production_id' => 32,
                'created_at' => '2024-06-12 23:07:44',
                'updated_at' => '2024-06-12 23:07:44',
            ),
            8 => 
            array (
                'id' => 9,
                'code' => 'Arr-009',
                'masqué' => 0,
                'duration' => 15,
                'famille' => 'Logistique',
                'sfamille' => 'Retard de livraison',
                'class' => 'ressource humaine',
                'impact' => '100%',
                'production_id' => 2,
                'created_at' => '2024-06-12 23:09:07',
                'updated_at' => '2024-06-12 23:09:07',
            ),
            9 => 
            array (
                'id' => 10,
                'code' => 'Arr-010',
                'masqué' => 0,
                'duration' => 15,
                'famille' => 'Qualité',
                'sfamille' => 'Non-conformité des produits',
                'class' => 'Contrôle qualité',
                'impact' => '60%',
                'production_id' => 34,
                'created_at' => '2024-06-12 23:09:55',
                'updated_at' => '2024-06-12 23:09:55',
            ),
            10 => 
            array (
                'id' => 11,
                'code' => 'Arr-011',
                'masqué' => 0,
                'duration' => 60,
                'famille' => 'Technique',
                'sfamille' => 'Maintenance préventive',
                'class' => 'Maintenance',
                'impact' => '50%',
                'production_id' => 5,
                'created_at' => '2024-06-12 23:10:19',
                'updated_at' => '2024-06-12 23:10:19',
            ),
            11 => 
            array (
                'id' => 12,
                'code' => 'Arr-012',
                'masqué' => 0,
                'duration' => 10,
                'famille' => 'organisationnel',
                'sfamille' => 'gréve du personnelle',
                'class' => 'ressource humaine',
                'impact' => '100%',
                'production_id' => 5,
                'created_at' => '2024-06-12 23:10:33',
                'updated_at' => '2024-06-12 23:10:33',
            ),
            12 => 
            array (
                'id' => 13,
                'code' => 'Arr-013',
                'masqué' => 0,
                'duration' => 3,
                'famille' => 'Technique',
                'sfamille' => 'Panne électrique',
                'class' => 'Équipements',
                'impact' => '20%',
                'production_id' => 24,
                'created_at' => '2024-06-12 23:11:04',
                'updated_at' => '2024-06-12 23:11:04',
            ),
            13 => 
            array (
                'id' => 14,
                'code' => 'Arr-014',
                'masqué' => 0,
                'duration' => 39,
                'famille' => 'organisationnel',
                'sfamille' => 'Manifestation des employés',
                'class' => 'Opérations',
                'impact' => '90%',
                'production_id' => 8,
                'created_at' => '2024-06-12 23:11:27',
                'updated_at' => '2024-06-12 23:11:27',
            ),
            14 => 
            array (
                'id' => 15,
                'code' => 'Arr-015',
                'masqué' => 0,
                'duration' => 20,
                'famille' => 'organisationnel',
                'sfamille' => 'Manifestation des employés',
                'class' => 'Opérations',
                'impact' => '90%',
                'production_id' => 14,
                'created_at' => '2024-06-12 23:11:50',
                'updated_at' => '2024-06-12 23:11:50',
            ),
            15 => 
            array (
                'id' => 16,
                'code' => 'Arr-016',
                'masqué' => 0,
                'duration' => 120,
                'famille' => 'Technique',
                'sfamille' => 'Panne électrique',
                'class' => 'Équipements',
                'impact' => '20%',
                'production_id' => 22,
                'created_at' => '2024-06-12 23:16:04',
                'updated_at' => '2024-06-12 23:16:04',
            ),
            16 => 
            array (
                'id' => 17,
                'code' => 'Arr-017',
                'masqué' => 0,
                'duration' => 10,
                'famille' => 'Qualité',
                'sfamille' => 'Non-conformité des produits',
                'class' => 'ressource humaine',
                'impact' => '100%',
                'production_id' => 22,
                'created_at' => '2024-06-12 23:16:31',
                'updated_at' => '2024-06-12 23:16:31',
            ),
            17 => 
            array (
                'id' => 18,
                'code' => 'Arr-018',
                'masqué' => 0,
                'duration' => 20,
                'famille' => 'Qualité',
                'sfamille' => 'Non-conformité des produits',
                'class' => 'Contrôle qualité',
                'impact' => '60%',
                'production_id' => 23,
                'created_at' => '2024-06-12 23:16:59',
                'updated_at' => '2024-06-12 23:16:59',
            ),
            18 => 
            array (
                'id' => 19,
                'code' => 'Arr-019',
                'masqué' => 0,
                'duration' => 40,
                'famille' => 'Technique',
                'sfamille' => 'Maintenance préventive',
                'class' => 'Maintenance',
                'impact' => '50%',
                'production_id' => 26,
                'created_at' => '2024-06-12 23:17:23',
                'updated_at' => '2024-06-12 23:17:23',
            ),
            19 => 
            array (
                'id' => 20,
                'code' => 'Arr-020',
                'masqué' => 0,
                'duration' => 40,
                'famille' => 'Qualité',
                'sfamille' => 'Non-conformité des produits',
                'class' => 'Contrôle qualité',
                'impact' => '60%',
                'production_id' => 27,
                'created_at' => '2024-06-12 23:17:53',
                'updated_at' => '2024-06-12 23:17:53',
            ),
            20 => 
            array (
                'id' => 21,
                'code' => 'Arr-021',
                'masqué' => 0,
                'duration' => 19,
                'famille' => 'Logistique',
                'sfamille' => 'Retard de livraison',
                'class' => 'Logistique',
                'impact' => '20%',
                'production_id' => 15,
                'created_at' => '2024-06-12 23:18:34',
                'updated_at' => '2024-06-12 23:18:34',
            ),
            21 => 
            array (
                'id' => 22,
                'code' => 'Arr-022',
                'masqué' => 0,
                'duration' => 50,
                'famille' => 'Qualité',
                'sfamille' => 'Non-conformité des produits',
                'class' => 'Contrôle qualité',
                'impact' => '60%',
                'production_id' => 19,
                'created_at' => '2024-06-12 23:19:04',
                'updated_at' => '2024-06-12 23:19:04',
            ),
        ));
        
        
    }
}