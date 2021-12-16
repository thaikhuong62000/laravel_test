<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 60);
            $table->string('cmnd', 12)->unique();
            $table->string('phone', 11)->unique();
            $table->string('email', 100)->unique();
            $table->string('address', 60);
            $table->string('tp', 30);
            $table->string('quan', 30);
            $table->string('phuong', 30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registers');
    }
}
