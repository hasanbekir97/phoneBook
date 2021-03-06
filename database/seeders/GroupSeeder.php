<?php

namespace Database\Seeders;

use App\Models\Groups;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Groups::truncate();

        // And now, let's create a few groups in our database:
        Groups::create([
            'name' => "Family"
        ]);
        Groups::create([
            'name' => "Work"
        ]);
        Groups::create([
            'name' => "School"
        ]);
    }
}
