<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    private function tableName()
    {
        $prefix = env('DB_TABLE_PREFIX');

        if($prefix) $prefix .= "_";

        return $prefix . 'reviews';
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
            $table->string('email', 255)->unique();
            $table->text('review')->default('');
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
