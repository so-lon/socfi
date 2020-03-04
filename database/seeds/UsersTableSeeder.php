<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 20)->create();

        DB::table('users')->insert([
            'id'                => (string) Str::uuid(),
            'username'          => 'socfisystem',
            'name'              => 'Socfi System',
            'email'             => 'socfisystem@gmail.com',
            'avatar'            => 'img/avatar/meeps.jpg',
            'role'              => '0',
            'password'          => Hash::make('socfi123'),
            'email_verified_at' => now(),
            'created_at'        => now(),
            'updated_at'        => now()
        ]);

    }
}
