<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedOccurrencesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('occurrences')->insert(
            array(
                array(
                    'id' => '1',
                    'occurrence' => 'Estado dos arruamentos',
                    'category_id' => '1'
                ),
                array(
                    'id' => '2',
                    'occurrence' => 'Estado dos passeios',
                    'category_id' => '1'
                ),
                array(
                    'id' => '3',
                    'occurrence' => 'Lixo disperso',
                    'category_id' => '2'
                ),
                array(
                    'id' => '4',
                    'occurrence' => 'Degradação habitacional',
                    'category_id' => '2'
                ),
                array(
                    'id' => '5',
                    'occurrence' => 'Degradação das áreas públicas comuns',
                    'category_id' => '2'
                ),
                array(
                    'id' => '6',
                    'occurrence' => 'Sinais de Vandalismo/Vandalismo',
                    'category_id' => '2'
                ),
                array(
                    'id' => '7',
                    'occurrence' => 'Camaras de Vigilância',
                    'category_id' => '3'
                ),
                array(
                    'id' => '8',
                    'occurrence' => 'Patrulhamento',
                    'category_id' => '3'
                ),
                array(
                    'id' => '9',
                    'occurrence' => 'Transeuntes',
                    'category_id' => '3'
                ),
                array(
                    'id' => '10',
                    'occurrence' => 'Residentes/Moradores',
                    'category_id' => '3'
                ),
                array(
                    'id' => '11',
                    'occurrence' => 'Delimitação de passagens pedonais',
                    'category_id' => '4'
                ),
                array(
                    'id' => '12',
                    'occurrence' => 'Areas/ Espaços de confinamento',
                    'category_id' => '4'
                ),
                array(
                    'id' => '14',
                    'occurrence' => 'Iluminacao',
                    'category_id' => '5'
                ),
                array(
                    'id' => '15',
                    'occurrence' => 'Barreiras Fisicas',
                    'category_id' => '5'
                ),
                array(
                    'id' => '16',
                    'occurrence' => 'Esquinas cegas',
                    'category_id' => '5'
                ),
                array(
                    'id' => '17',
                    'occurrence' => 'Locais cegos',
                    'category_id' => '5'
                ),
                array(
                    'id' => '18',
                    'occurrence' => 'Distribuição de iluminação',
                    'category_id' => '5'
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
