<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Vulnerability;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('Pass1234'),
        ]);

        $this->seedVulnerabilitiesFromJson($user);
    }

    protected function seedVulnerabilitiesFromJson(User $user)
    {
        $json = file_get_contents(__DIR__ . '/vulnerability_data.json');
        $data = collect(json_decode($json, true));

        $data->each(fn (array $vulnerabilityData) => Vulnerability::create([...$vulnerabilityData, 'user_id' => $user->getKey()]));
    }
}
