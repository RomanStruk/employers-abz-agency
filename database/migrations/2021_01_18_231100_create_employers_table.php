<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();

            $table->string('name', 256);
            $table->string('phone', 256);
            $table->string('email', 256);
            $table->bigInteger('position_id')->unsigned();
            $table->float('salary')->unsigned();
            $table->bigInteger('head_id')->unsigned();
            $table->timestamp('date_of_employment');

            $table->bigInteger('created_id')->unsigned();
            $table->bigInteger('updated_id')->unsigned();

            $table->string('photo')->default('/storage/user2-160x160.jpg');

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
        Schema::dropIfExists('employers');
    }
}
