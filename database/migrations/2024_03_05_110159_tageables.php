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
        Schema::create('tageables', function (Blueprint $table) {
            $table->integer("etiqueta_id");
            $table->integer("tageable_id");
            $table->string("tageable_type");
            $table->primary(["etiqueta_id", "tageable_id" ,"tageable_type"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tageables');
    }
};
