<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('posts')->insert([
        //     'title'=>'java',
        //     'body'=>'welcome to learn',
        //     'auther'=>'oday',
        //     'category_id'=> 1 ,
        //     'published'=> 1

        // ]);
        factory(Post::class, 10)->create();
    }
}


