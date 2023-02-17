<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        $categories = [
            array(
                'name' => 'Category 1',
                'children' => [
                    'Category 1-1',
                    'Category 1-2',
                ]
            ),
            array(
                'name' => 'Category 2',
                'children' => [
                    'Category 2-1',
                    'Category 2-2',
                ]
            ),
        ];



        foreach ($categories as $key => $category){
            $id = Category::create(['name' => $category['name']])->id;
            if(isset($category['children']) && !empty($category['children'])) {
                foreach ($category['children'] as $children) {
                    Category::create([
                        'parent_id' => $id,
                        'name' => $children
                    ]);
                }
            }

        }


     //   DB::table('categories')->insert($categories);
    }
}
