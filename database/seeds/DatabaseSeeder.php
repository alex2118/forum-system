<?php

use App\Forum;
use App\Subforum;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Forum::class, 8)->create();

        factory(Subforum::class, 32)->create();
    }
}
