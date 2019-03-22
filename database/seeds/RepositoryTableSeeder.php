<?php

use App\Models\Repository;
use Illuminate\Database\Seeder;

class RepositoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Repository::class, 10)
            ->create();
    }
}
