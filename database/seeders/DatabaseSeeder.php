<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->insert([
            ['name' => 'Frontend Web Programmer'],
            ['name' => 'Fulstack Web Programmer'],
            ['name' => 'Quality Qontrol']
        ]);

        DB::table('skills')->insert([
            ['name' => 'PHP'],
            ['name' => 'PostgreSQL'],
            ['name' => 'API(JSON,REST)'],
            ['name' => 'Version Control System(Gitlab,Github)']
        ]);
    }
}
