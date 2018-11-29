<?php

use Illuminate\Database\Seeder;

class HorarisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('horaris')->insert([
            'day' => 'dilluns' ,
            'start' => '00:00:00',
            'finish' => '08:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'dilluns' ,
            'start' => '08:00:00',
            'finish' => '16:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'dilluns' ,
            'start' => '16:00:00',
            'finish' => '00:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'dimarts' ,
            'start' => '00:00:00',
            'finish' => '08:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'dimarts' ,
            'start' => '08:00:00',
            'finish' => '16:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'dimarts' ,
            'start' => '16:00:00',
            'finish' => '00:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'dimecres' ,
            'start' => '00:00:00',
            'finish' => '08:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'dimecres' ,
            'start' => '08:00:00',
            'finish' => '16:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'dimecres' ,
            'start' => '16:00:00',
            'finish' => '00:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'dijous' ,
            'start' => '00:00:00',
            'finish' => '08:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'dijous' ,
            'start' => '08:00:00',
            'finish' => '16:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'dijous' ,
            'start' => '16:00:00',
            'finish' => '00:00:00'
        ]);


        DB::table('horaris')->insert([
            'day' => 'divendres' ,
            'start' => '00:00:00',
            'finish' => '08:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'divendres' ,
            'start' => '08:00:00',
            'finish' => '16:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'divendres' ,
            'start' => '16:00:00',
            'finish' => '00:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'dissabte' ,
            'start' => '00:00:00',
            'finish' => '08:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'dissabte' ,
            'start' => '08:00:00',
            'finish' => '16:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'dissabte' ,
            'start' => '16:00:00',
            'finish' => '00:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'diumenge' ,
            'start' => '00:00:00',
            'finish' => '08:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'diumenge' ,
            'start' => '08:00:00',
            'finish' => '16:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'diumenge' ,
            'start' => '16:00:00',
            'finish' => '00:00:00'
        ]);
        
        
    }
}
