<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    private function tableName()
    {
        $prefix = env('DB_TABLE_PREFIX');

        if($prefix) $prefix .= "_";

        return $prefix . 'categories';
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * CREATE TABLE `skpt_categories` (
         *   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
         *   `category_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
         *   `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
         *   `created_at` timestamp NULL DEFAULT NULL,
         *   `updated_at` timestamp NULL DEFAULT NULL,
         *   PRIMARY KEY (`id`),
         *   UNIQUE KEY `skpt_categories_category_name_unique` (`category_name`)
         * ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
         */

        Schema::create($this->tableName(), function (Blueprint $table) {
            $table->engine = 'MyISAM';

            $table->increments('id');
            
            $table->string('category_name', 128)->unique();
            $table->mediumText('description');

            // Creates created_at and updated_at
            $table->datetime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->datetime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop($this->tableName());
    }
}
