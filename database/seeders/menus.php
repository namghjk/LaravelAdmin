<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class menus extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'name'=>'Iphone',
            'parent_id'=>0,
            'description'=>'Iphone',
            'content'=>'Iphone',
            'slug'=>'Iphone',
            'active'=>1,
        ]);
    }
}
