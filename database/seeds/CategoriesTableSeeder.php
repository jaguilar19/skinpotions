<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategoriesTableSeeder extends Seeder
{
    private function tableName($name)
    {
        $prefix = env('DB_TABLE_PREFIX');

        if($prefix) $prefix .= "_";

        return $prefix . $name;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['category_name' => 'Category 1', 'Description' => 'Harana para sa dalaga...'],
            ['category_name' => 'Category 2', 'Description' => 'Dalaga na balak makasama...'],
            ['category_name' => 'Category 3', 'Description' => 'Kung di dahil sa gayuma...'],
            ['category_name' => 'Category 4', 'Description' => 'Pinaliguan ko ng bala...'],
        ];

        DB::table($this->tableName('categories'))->insert($data);
    }
}
