<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class City extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('city')) {
			Schema::create('city', function (Blueprint $table) {
				$table->id();
				$table->string('name');
				$table->unsignedBigInteger('country_id');
				$table->foreign('country_id')->references('id')->on('country');
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
        if (Schema::hasTable('city')) {
			Schema::table('city', function (Blueprint $table) {
				$table->dropForeign(['country_id']);
			});
		}
		Schema::dropIfExists('city');
    }
}
