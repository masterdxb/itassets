<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItassetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itassets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id');
            $table->string('name', 500)->nullable();
            $table->text('description')->nullable();
            $table->string('type', 100)->nullable();
            $table->datetime('purchase_date')->nullable();
            $table->string('status', 50)->nullable();
            $table->softDeletes();
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
        Schema::drop('itassets');
    }
}
