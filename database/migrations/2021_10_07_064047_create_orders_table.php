<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('zone_id')->references('id')->on('zones')->onDelete('cascade');
            $table->foreignId('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->foreignId('territory_id')->references('id')->on('territories')->onDelete('cascade');
            $table->foreignId('destributor_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('total');
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
