<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   
    public function run(): void
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(LignesTableSeeder::class);
        $this->call(AteliersTableSeeder::class);
        $this->call(CatalogsTableSeeder::class);
       
       
       
       
        $this->call(ArticlesTableSeeder::class);
        $this->call(CadencesTableSeeder::class);
        $this->call(RecettesTableSeeder::class);
        $this->call(PlanningsTableSeeder::class);
    }
}
