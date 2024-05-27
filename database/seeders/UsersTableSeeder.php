<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['tribe_id' => 4, 'timezone_id' => 1, 'language_id' => 49, 'username' => 'Support', 'password' => bcrypt(md5_gen()), 'email' => 'support@laravian.net', 'status' => 1, 'activated_at' => Carbon::now()],
            ['tribe_id' => 5, 'timezone_id' => 1, 'language_id' => 49, 'username' => 'Natars', 'password' => bcrypt(md5_gen()), 'email' => 'natars@laravian.net', 'status' => 1, 'activated_at' => Carbon::now()],
            ['tribe_id' => 4, 'timezone_id' => 1, 'language_id' => 49, 'username' => 'Nature', 'password' => bcrypt(md5_gen()), 'email' => 'nature@laravian.net', 'status' => 1, 'activated_at' => Carbon::now()],
            ['tribe_id' => 4, 'timezone_id' => 1, 'language_id' => 49, 'username' => 'Multihunter', 'password' => bcrypt(md5_gen()), 'email' => 'multihunter@laravian.net', 'status' => 1, 'activated_at' => Carbon::now()]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
