<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(BranchSeeder::class);
//         $this->call(DepartmentSeeder::class);
//        $this->call(UserSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(EmployeeSeeder::class);
//        $this->call(CommentSeeder::class);
    }
}
