<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppTables extends Migration
{
    const MyISAM = 'MyISAM';
    const TABLE_PREFIX = 'skpt_';

    /**
     *  Common column definitions
     */

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->createTableCategories();
        $this->createTableItems();
        $this->createTableTransactions();
        $this->createTableProductRatings();
        $this->createTableItemReviews();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop(self::TABLE_PREFIX . 'categories');
        Schema::drop(self::TABLE_PREFIX . 'items');
        Schema::drop(self::TABLE_PREFIX . 'transactions');
        Schema::drop(self::TABLE_PREFIX . 'product_ratings');
        Schema::drop(self::TABLE_PREFIX . 'product_reviews');
    }

    /**
     *  Naming conventions:
     *      Table: Noun in plural form.
     *      Table columns: Noun in singular form.
     * 
     *  The naming of reference columns follows this format:
     *  
     *      [table name in singular form]_[column name]
     *
     *  For example, if table Items references the column `id` of 
     *      table Categories, the column name in Items would be:
     * 
     *      category_id
     */

    private function createTableCategories()
    {
        /**
         *  CREATE TABLE IF NOT EXISTS `skpt_categories` (
         *      id int UNSIGNED NOT NULL AUTO_INCREMENT,
         *      category_name text,
         *      description text,
         *      created_at datetime,
         *      updated_at datetime,
         *      PRIMARY KEY id,
         *      UNIQUE KEY skpt_categories_category_name_unique
         *  ) ENGINE=MyISAM;
         */
        $table_name = self::TABLE_PREFIX . 'categories';

        Schema::create($table_name, function (Blueprint $table) {

            $table->engine = self::MyISAM;

            $table->increments('id');
            
            $table->string('category_name', 128)->unique();
            $table->mediumText('description');

            // Creates created_at and updated_at
            $table->timestamps();
        });
    }

    private function createTableItems()
    {
        /**
         *  CREATE TABLE IF NOT EXISTS `skpt_items` (
         *      id int UNSIGNED NOT NULL AUTO_INCREMENT,
         *      code varchar(128),
         *      name varchar(128),
         *      description mediumtext,
         *      unit_price float(6, 2) DEFAULT 0.0,
         *      stock int DEFAULT 0,
         *      category_id int unsigned,
         *      created_at datetime,
         *      updated_at datetime,
         *      PRIMARY KEY id
         *  ) ENGINE=MyISAM;
         */
        $table_name = self::TABLE_PREFIX . 'items';

        Schema::create($table_name, function (Blueprint $table) {

            $table->engine = self::MyISAM;

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

    private function createTableTransactions()
    {
        $table_name = self::TABLE_PREFIX . 'transactions';

        Schema::create($table_name, function(Blueprint $table) 
        {
            $table->engine = self::MyISAM;

            $table->increments('id');

            $table->string('item_code', 128)->index();
            $table->integer('quantity')->unsigned();
            $table->decimal('unit_price', 6, 2)->index();
            $table->decimal('order_total', 7, 2)->index();


            $table->string('reference_id')->unique();

            // The set here is just a draft.
            $table->enum('status', ['PENDING', 'PROCESSING', 'PAID', 'CANCELLED', 'RETURNED']);

            $table->timestamps();
        });
    }

    private function createTableProductRatings()
    {
        $table_name = self::TABLE_PREFIX . 'product_ratings';

        Schema::create($table_name, function(Blueprint $table)
        {
            $table->engine = self::MyISAM;

            $table->string('item_code', 128)->index();
            $table->enum('rating', [1, 2, 3, 4, 5])->nullable();
            $table->string('email')->index();
            $table->timestamps();

            $table->unique(['item_code', 'email']);
        });
    }

    private function createTableItemReviews()
    {
        $table_name = self::TABLE_PREFIX . 'product_reviews';

        Schema::create($table_name, function(Blueprint $table)
        {
            $table->engine = self::MyISAM;

            $table->string('item_code', 128)->index();
            $table->string('email')->index();
            $table->text('review')->default('');
            $table->timestamps();

            $table->unique(['item_code', 'email']);
        });
    }

} // End of class
