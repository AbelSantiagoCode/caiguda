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
            'day' => 'Monday' ,
            'start' => '01:00:00',
            'finish' => '08:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'Monday' ,
            'start' => '08:00:00',
            'finish' => '16:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'Monday' ,
            'start' => '16:00:00',
            'finish' => '23:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'Tuesday' ,
            'start' => '01:00:00',
            'finish' => '08:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'Tuesday' ,
            'start' => '08:00:00',
            'finish' => '16:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'Tuesday' ,
            'start' => '16:00:00',
            'finish' => '23:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'Wednesday' ,
            'start' => '01:00:00',
            'finish' => '08:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'Wednesday' ,
            'start' => '08:00:00',
            'finish' => '16:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'Wednesday' ,
            'start' => '16:00:00',
            'finish' => '23:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'Thursday' ,
            'start' => '01:00:00',
            'finish' => '08:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'Thursday' ,
            'start' => '08:00:00',
            'finish' => '16:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'Thursday' ,
            'start' => '16:00:00',
            'finish' => '23:00:00'
        ]);


        DB::table('horaris')->insert([
            'day' => 'Friday' ,
            'start' => '01:00:00',
            'finish' => '08:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'Friday' ,
            'start' => '08:00:00',
            'finish' => '16:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'Friday' ,
            'start' => '16:00:00',
            'finish' => '00:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'Saturday' ,
            'start' => '01:00:00',
            'finish' => '08:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'Saturday' ,
            'start' => '08:00:00',
            'finish' => '16:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'Saturday' ,
            'start' => '16:00:00',
            'finish' => '23:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'Sunday' ,
            'start' => '01:00:00',
            'finish' => '08:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'Sunday' ,
            'start' => '08:00:00',
            'finish' => '16:00:00'
        ]);

        DB::table('horaris')->insert([
            'day' => 'Sunday' ,
            'start' => '16:00:00',
            'finish' => '23:00:00'
        ]);
        
        
    }
}
