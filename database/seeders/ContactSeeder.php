<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 15; $i++){
            Contact::create([
                'name' => fake()->unique()->name(),
                'email' => fake()->unique()->email(),
                'phone' => fake()->unique()->numerify('##########'),
                'address' => fake()->unique()->address()

            ]);
        }
    }
}