<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call([
          \RolesTableSeeder::class,
          \UsersTableSeeder::class,
          \SectorsTableSeeder::class,
          \PositionsTableSeeder::class,
          \SsidsTableSeeder::class,
          \Position_SsidTableSeeder::class,
          \ClientsTableSeeder::class,
          \DevicesTableSeeder::class,
	  \HorarisTableSeeder::class,
	  \CaigudesTableSeeder::class

        ]);
    }
}
