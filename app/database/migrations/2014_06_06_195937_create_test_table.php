<?php

use Illuminate\Database\Migrations\Migration;

class CreateTestTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('amans', function ($table) {

            $table->increments('id');
            $table->string('name');
            $table->text('bin');
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
        //
        Schema::drop('amans');
    }

}
