<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class Generate_article extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $categories = ['movies','books','music','video games','art'];
        $category = array_rand($categories, 1);

        $content = $faker->realText($maxNbChars = 300, $indexSize = 5);

        DB::table('articles')->insert([
            'author' => $faker->name,
            'category' => $categories[array_rand($categories, 1)],
            'title' => $faker->realText($maxNbChars = 20, $indexSize = 1),
            'abstract' => implode(' ', array_slice(explode(' ', $content), 0, 15)),
            'content' => $content,
            'is_published' => rand(0, 1)
        ]);
    }
}
