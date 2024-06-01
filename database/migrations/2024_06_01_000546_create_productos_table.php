<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id_pro');
            $table->string('nombre_pro',25)->nullable('false');
            $table->string('descripcion_pro',50)->nullable('false');
            $table->double('precio_pro')->nullable('false');
            $table->integer('cat_id')->unsigned()->nullable('false');
            $table->timestamps();

            $table->foreign('cat_id')->references('id_cat')->on('categorias')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
