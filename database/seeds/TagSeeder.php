<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('tags')->insert([
        //     'name'=>'ahmed'

        // ]);
        // Tag::factory(10)->create();

        factory(Tag::class, 50)->create();

    }
}
