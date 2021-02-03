<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = 'Điện thoại';
        $category->desc = 'Thể loại điện thoại';
        $category->save();

        $category = new Category();
        $category->name = 'Laptop';
        $category->desc = 'Thể loại Latop';
        $category->save();

        $category = new Category();
        $category->name = 'Tủ lạnh';
        $category->desc = 'Thể loại tủ lạnh';
        $category->save();
    }
}
