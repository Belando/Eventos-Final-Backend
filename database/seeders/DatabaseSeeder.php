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
        
        //registro de tipo de roles

        DB::table('roles')
        ->insert([
            [
                'name' => 'admin',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'user',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'organizer',
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s')
            ]
            
        ]);

        \App\Models\User::factory(10)->create();
        // \App\Models\Hall::factory(30)->create();
        // \App\Models\Ticket::factory(20)->create();
        // \App\Models\Organizer::factory(20)->create();
        // \App\Models\Event::factory(50)->create();
        
        
        
    }
}
