<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Location extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('location')) {
			Schema::create('location', function (Blueprint $table) {
				$table->id();
				$table->string('name');
				$table->unsignedBigInteger('city_id');
				$table->foreign('city_id')->references('id')->on('city');
				$table->timestamps();
			});
		}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('location')) {
			Schema::table('location', function (Blueprint $table) {
				$table->dropForeign(['city_id']);
			});
		}
		Schema::dropIfExists('location');
    }
}
