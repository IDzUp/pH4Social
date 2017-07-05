<?php

use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('aman', function ($table) {

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
        Schema::drop('aman');
    }

}
