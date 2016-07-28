<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{

    private function tableName()
    {
        $prefix = env('DB_TABLE_PREFIX');

        if($prefix) $prefix .= "_";

        return $prefix . 'items';
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * CREATE TABLE `skpt_items` (
         *   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
         *   `code` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
         *   `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
         *   `description` mediumtext COLLATE utf8_unicode_ci,
         *   `price` decimal(6,2) NOT NULL DEFAULT '0.00',
         *   `quantity` int(10) unsigned NOT NULL DEFAULT '0',
         *   `category_id` int(10) unsigned DEFAULT NULL,
         *   `img_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
         *   `created_at` timestamp NULL DEFAULT NULL,
         *   `updated_at` timestamp NULL DEFAULT NULL,
         *   PRIMARY KEY (`id`),
         *   UNIQUE KEY `skpt_items_code_unique` (`code`),
         *   UNIQUE KEY `skpt_items_name_unique` (`name`)
         * ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
         */

        Schema::create($this->tableName(), function (Blueprint $table) {
            $table->engine = 'MyISAM';

            $table->increments('id');

            $table->string('code', 128)->unique();
            $table->string('name', 128)->unique();
            $table->mediumText('description')->nullable();
            $table->decimal('price', 6, 2)->default(0.0);
            $table->integer('quantity')->unsigned()->default(0);
            $table->integer('category_id')->unsigned()->nullable();

            // This should refer to the filename part only
            // We should device some sort of naming convention so we can 
            // properly identify which image file belongs to which.
            $table->string('img_file')->nullable();

            $table->timestamps();
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
