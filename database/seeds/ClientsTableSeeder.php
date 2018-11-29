<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('clients')->insert([
        ['dni'=>'dni1','name'=>'name1','contact_telephone'=>664808440,'email'=>'email1@email1.com','photo'=>'photo1'],
        ['dni'=>'dni2','name'=>'name2','contact_telephone'=>664903640,'email'=>'email2@email2.com','photo'=>'photo2'],
        ['dni'=>'dni3','name'=>'name3','contact_telephone'=>664103740,'email'=>'email3@email3.com','photo'=>'photo3'],
        ['dni'=>'dni4','name'=>'name4','contact_telephone'=>664203840,'email'=>'email4@email4.com','photo'=>'photo4'],
        ['dni'=>'dni5','name'=>'name5','contact_telephone'=>664303940,'email'=>'email5@email5.com','photo'=>'photo5'],
        ['dni'=>'dni6','name'=>'name6','contact_telephone'=>664404040,'email'=>'email6@email6.com','photo'=>'photo6'],
        ['dni'=>'dni7','name'=>'name7','contact_telephone'=>664504140,'email'=>'email7@email7.com','photo'=>'photo7'],
        ['dni'=>'dni8','name'=>'name8','contact_telephone'=>664604240,'email'=>'email8@email8.com','photo'=>'photo8']
      ]);
    }
}
