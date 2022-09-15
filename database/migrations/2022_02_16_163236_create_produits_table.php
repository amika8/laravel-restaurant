<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('recettes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
        });

        Schema::create('produits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->float("prix");
            $table->integer('quantite');
        });
        Schema::create('unites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->integer('convertisseur');
        });
        //Insert valeurs par defauts :
        DB::table('unites')->insert(
            array(
                'nom' => 'Gramme',
                'convertisseur' => 1000
            )
        );
        DB::table('unites')->insert(
            array(
                'nom' => 'Kilogramme',
                'convertisseur' => 1
            )
        );
        DB::table('unites')->insert(
            array(
                'nom' => 'Centilitre',
                'convertisseur' => 100
            )
        );
        DB::table('unites')->insert(
            array(
                'nom' => 'Decilitre',
                'convertisseur' => 10
            )
        );
        DB::table('unites')->insert(
            array(
                'nom' => 'Litre',
                'convertisseur' => 1
            )
        );
        DB::table('unites')->insert(
            array(
                'nom' => 'Piece',
                'convertisseur' => 1
            )
        );
        DB::table('unites')->insert(
            array(
                'nom' => 'CuillereCafe',
                'convertisseur' => 1
            )
        );
        DB::table('unites')->insert(
            array(
                'nom' => 'CuillereSoupe',
                'convertisseur' => 3
            )
        );

        Schema::table('produits', function (Blueprint $table) {

            $table->foreignId('recette_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('unite_id')->constrained()->onDelete('cascade')->onUpdate('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recettes');
        Schema::dropIfExists('produits');
        Schema::dropIfExists('unite');
    }
};
