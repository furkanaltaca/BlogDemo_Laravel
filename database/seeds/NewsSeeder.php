<?php

use App\Models\News;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        for ($i=0; $i < 5; $i++) {
            $title=$faker->sentence(6);
            $news=new News([
                'category_id'=>rand(33,40),
                'title'=>$title,
                'image'=>$faker->imageUrl('800', '400', 'cats', true),
                'content'=>$faker->paragraph(6),
                'slug'=>Str::slug($title),
                'created_at'=>$faker->dateTime('now'),
                'updated_at'=>$faker->dateTime('now')
            ]);

            $news->save();
        }
    }
}
