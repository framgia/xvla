<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Framgia\Xvla\User::query()->forceDelete();
        
        \Framgia\Xvla\User::create([
            'id' => 1,
            'email' => 'admin@example.com',
            'name' => 'admin',
            'password' => bcrypt('12345678'),
        ]);

        factory(\Framgia\Xvla\News::class)->times(10)->create([
            'user_id' => 1,
        ]);
    }
}
