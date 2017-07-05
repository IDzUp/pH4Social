<?php

use Illuminate\Database\Migrations\Migration;

class AddAuthors extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::table('authors')->insert(array(
            'name' => 'sahil kaushal',
            'bin' => 'hello'


        ));

        DB::table('authors')->insert(array(
            'name' => 'test',
            'bin' => 'hello'


        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //

        DB::table('authors')->where('name', '=', 'sahil kaushal')->delete();
    }

}
