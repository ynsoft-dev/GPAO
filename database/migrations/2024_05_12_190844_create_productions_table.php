<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->date('date');
            $table->integer('quart');
            $table->string('équipe');
            $table->unsignedBigInteger('atelier_id');
            $table->unsignedBigInteger('ligne_id');
            $table->unsignedBigInteger('article_id');
            $table->string('unité');
            $table->integer('quantité_p');
            $table->integer('lot');
            $table->decimal('tt', 8, 2)->nullable(); // 2 chiffres après la virgule, nullable
            $table->decimal('tu', 8, 2)->nullable(); 
            $table->decimal('trs', 8, 2)->nullable();
            
            $table->foreign('atelier_id')->references('id')->on('ateliers')->onDelete('cascade');
            $table->foreign('ligne_id')->references('id')->on('lignes')->onDelete('cascade');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');

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
        Schema::dropIfExists('productions');
    }
};