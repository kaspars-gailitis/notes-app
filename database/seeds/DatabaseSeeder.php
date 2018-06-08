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
      DB::table('note_type')->insert([
        'type_name' => 'default',
      ]);
      DB::table('note_type')->insert([
        'type_name' => 'to-do',
      ]);
      DB::table('note_type')->insert([
        'type_name' => 'collaborative ',
      ]);
    }
}
