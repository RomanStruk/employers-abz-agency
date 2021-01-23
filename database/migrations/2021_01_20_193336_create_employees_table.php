<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('name', 256)->index();
            $table->string('phone', 256)->index();
            $table->string('email', 256)->index();
            $table->bigInteger('position_id')->unsigned()->index();
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');

            $table->float('salary')->unsigned()->index();
            $table->timestamp('date_of_employment')->index();

            $table->bigInteger('admin_created_id')->unsigned()->index();
            $table->bigInteger('admin_updated_id')->unsigned()->index();

            $table->string('photo');

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
        Schema::dropIfExists('employees');
    }
}
