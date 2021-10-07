<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nic');
            $table->string('address');
            $table->string('mobile');
            $table->foreignId('gender_id')->nullable();
            $table->foreignId('territory_id');
            $table->string('user_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'nic',
                'address',
                'mobile',
                'gender_id',
                'territory_id',
                'user_name',
            ]);
        });
    }
}
