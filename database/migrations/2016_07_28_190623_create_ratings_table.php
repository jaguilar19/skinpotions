<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    private function tableName()
    {
        $prefix = env('DB_TABLE_PREFIX');

        if($prefix) $prefix .= "_";

        return $prefix . 'ratings';
    }

    private function findAndDropTable()
    {
        if(Schema::hasTable($this->tableName()))
        {
            Schema::drop($this->tableName());
        }

    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->findAndDropTable();

        Schema::create($this->tableName(), function (Blueprint $table) {
            $table->engine = 'MyISAM';

            $table->string('item_code', 128)->index();
            $table->enum('rating', [1, 2, 3, 4, 5])->nullable();
            $table->string('email', 255)->unique();
            $table->string('ipaddr', 64)->index();
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
