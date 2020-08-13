<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            'Hakkımızda',
            'Kariyer',
            'İletişim',
        ];

        $count=0;
        foreach ($pages as $page) {
            $count++;
            DB::table('pages')->insert([
                'title' => $page,
                'slug' => Str::slug($page, '-'),
                'content'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                            Maiores earum porro deserunt animi illum eius dolor soluta doloremque 
                            expedita esse, quisquam cum quae exercitationem perferendis odit atque, 
                            distinctio labore. Eius.',
                'image'=>'https://www.polandunraveled.com/wp-content/uploads/2018/09/business-.jpg',
                'order'=>$count,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
