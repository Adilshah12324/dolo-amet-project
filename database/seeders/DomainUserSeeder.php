<?php

namespace Database\Seeders;

use App\Models\Domain;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class DomainUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('role_id','!=',1)->get();
        $domain = Domain::all();

        $faker = Faker::create();
        foreach (range(1,5) as $value) {
            DB::table('domain_user')->insert([
                'domain_id' => $domain->random()->id,
                'user_id' => $user->random()->id,
            ]);
        }
    }
}
