<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin nidejia',
            'email' => 'admin@nidejia.com',
            'role' => 'admin'
        ]);

        $users = User::factory(10)->create();
        $listings = Listing::factory(10)->create();

        Transaction::factory(10)
            ->state(
                new Sequence(
                    fn(Sequence $sequence) => [
                        'user_id' => $users->random(),
                        'listing_id' => $listings->random()
                    ],
                )
            )->create();
    }
}