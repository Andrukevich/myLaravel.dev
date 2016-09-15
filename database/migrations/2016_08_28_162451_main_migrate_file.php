<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MainMigrateFile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->createOrdersTable();
        $this->createImageMigrate();
        $this->createNewsMigrate();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*<table_name>_<foreign_table_name>_<column_name>_foreign
        despatch_discrepancies   _pick_detail   _id_foreign (in my case)*/
        Schema::table('images', function (Blueprint $table){
            $table->dropForeign('images_order_id_foreign');
        });
        Schema::drop('orders');
        Schema::drop('news');
        Schema::drop('images');
    }

    private function createNewsMigrate()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title', 100);
            $table->string('slug', 150);
            $table->text('description');

            $table->timestamps();
        });
    }

    public function createImageMigrate()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->string('path');
            $table->string('th_path');

            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');
        });
    }

    private function createOrdersTable()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->tinyInteger('age');
            $table->string('name');
            $table->decimal('height', 3, 2);
            $table->integer('weight');
            $table->decimal('price', 7, 2);
            $table->decimal('special_price', 7, 2)->nullable();

            $table->timestamps();
        });
    }
}
