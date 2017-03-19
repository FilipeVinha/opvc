<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('categories')->insert(
            array(
                array(
                    'id' => '1',
                    'category' => 'Acessibilidade',
                    'icon' => 'acessibilidade'
                ),
                array(
                    'id' => '2',
                    'category' => 'Condições Ambientais',
                    'icon' => 'ambiental'
                ),
                array(
                    'id' => '3',
                    'category' => 'Controlo e Vigilância',
                    'icon' => 'vigilancia'
                ),
                array(
                    'id' => '4',
                    'category' => 'Estrutura de Espaços',
                    'icon' => 'espacos'
                ),
                array(
                    'id' => '5',
                    'category' => 'Visibilidade',
                    'icon' => 'visibilidade'
                ),
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
