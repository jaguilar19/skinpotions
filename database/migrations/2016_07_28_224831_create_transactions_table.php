<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    private function tableName()
    {
        $prefix = env('DB_TABLE_PREFIX');

        if($prefix) $prefix .= "_";

        return $prefix . 'transactions';
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName(), function (Blueprint $table) {
            $table->engine = 'MyISAM';

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
