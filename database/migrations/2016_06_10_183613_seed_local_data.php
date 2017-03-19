<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedLocalData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('locals')->insert(
            array(
                array(
                    'id' => '1',
                    'local' => 'Residencial'
                ),
                array(
                    'id' => '2',
                    'local' => 'Escolas/Locais com jovens'
                ),
                array(
                    'id' => '3',
                    'local' => 'Comercial/Industrial/Escritórios'
                ),
                array(
                    'id' => '4',
                    'local' => 'Comercial/Retalho'
                ),
                array(
                    'id' => '5',
                    'local' => 'Parques e jardins públicos'
                ), array(
                    'id' => '6',
                    'local' => 'Centros de lazer'
                ), array(
                    'id' => '7',
                    'local' => 'Outros'
                )
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
