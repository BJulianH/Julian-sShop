<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\provider;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // User::factory()->create([
            //     'name' => 'Test User',
            //     'email' => 'test@example.com',
            // ]);
            
            User::create([
                'username' => 'admin',
                'email' => 'admin@polindra.ac.id',
                'password' => Hash::make('password')
            ]);

            User::factory(1000)->create();
            
            $providers = ['XL', 'Telkomsel', 'Three', 'IM3'];
            foreach ($providers as $provider)
                Provider::create([
                    'name' => $provider,
            ]);
            
    }
}
