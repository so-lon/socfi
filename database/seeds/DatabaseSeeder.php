<?php

use App\Models\User;
use App\Models\News;
use App\Models\Field;
use App\Models\Stadium;
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
        // Create admin
        $this->call([UsersTableSeeder::class]);

        // Seeding
        factory(User::class, 20)->create()->each(
            function($user) {
                $admin = User::where('username', 'socfisystem')->get('id')->first();
                factory(News::class, 1)->create([
                    'created_by' => $admin->id,
                    'updated_by' => $admin->id,
                ]);
                if ($user->role == constants('user.role.field_owner')) {
                    factory(Stadium::class, 1)->create([
                        'owned_by'   => $user->id,
                        'created_by' => $admin->id,
                        'updated_by' => $user->id,
                    ])->each(
                        function($stadium) {
                            factory(Field::class, 5)->create([
                                'stadium_id' => $stadium->id,
                            ]);
                        }
                    );
                }
            }
        );
    }
}
