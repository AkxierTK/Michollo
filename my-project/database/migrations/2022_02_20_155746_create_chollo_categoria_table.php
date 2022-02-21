<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCholloCategoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chollo_categoria', function (Blueprint $table) {
            $table->id();

            $table->foreignId('chollos_id')
              ->nullable()
              ->constrained('chollos')
              ->cascadeOnUpdate()
              ->nullOnDelete();
        
            $table->foreignId('categorias_id')
              ->nullable()
              ->constrained('categorias')
              ->cascadeOnUpdate()
              ->nullOnDelete();
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
        Schema::dropIfExists('chollo_categoria');
    }
}
