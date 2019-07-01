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
        // DB::table('pages')->insert([
        //     'name_ro' => 'Despre Noi',
        //     'name_ru' => 'О нас',
        //     'name_en' => 'About us',
        //     'route_name'=> 'DespreNoi',
            
        // ]);
        // DB::table('texts')->insert([
        //     'description_ro' => 'Salut, lume',
        //     'description_ru' => 'Привет, мир',
        //     'description_en' => 'Hello, world',
        //     'page_id' => 1
            
        // ]);
        DB::table('languages')->insert([
            'language' => 'Romana'
        ]);
        DB::table('languages')->insert([
            'language' => 'Engleza'
        ]);
        DB::table('languages')->insert([
            'language' => 'Rusa'
        ]);

        DB::table("users")->insert([
            'name' => "Admin",
            'email' => "admin@admin.com",
            'password' => Hash::make("1234567890"),
        ]);





        // $this->call(UsersTableSeeder::class);
    }
}
