<?php

use App\Models\User;
use App\Models\News;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
        factory(User::class, 20)->create()->each(
            function($user) {
                factory(News::class, 1)->create([
                    'created_by' => $user->id,
                    'updated_by' => $user->id,
                ]);
            }
        );
    }
}
