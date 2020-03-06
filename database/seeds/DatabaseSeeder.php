<?php

use App\Models\Field;
use App\Models\User;
use App\Models\News;
use App\Models\Stadium;
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
        $this->call([UsersTableSeeder::class]);
        $admin = DB::table('users')->where('username', 'socfisystem')->value('id');
        factory(User::class, 20)->create()->each(
            function($user) {
                $admin = DB::table('users')->where('username', 'socfisystem')->value('id');
                factory(News::class, 1)->create([
                    'created_by' => $admin,
                    'updated_by' => $admin,
                ]);
                if ($user->role == constants('user.role.field_owner')) {
                    factory(Stadium::class, 1)->create([
                        'owned_by' => $admin,
                        'created_by' => $admin,
                        'updated_by' => $admin,
                    ])->each(
                        function($stadium) {
                            $admin = DB::table('users')->where('username', 'socfisystem')->value('id');
                            factory(Field::class, 5)->create([
                                'stadium_id' => $stadium->id,
                                'created_by' => $admin,
                                'updated_by' => $admin,
                            ]);
                        }
                    );
                }
            }
        );

    }
}
