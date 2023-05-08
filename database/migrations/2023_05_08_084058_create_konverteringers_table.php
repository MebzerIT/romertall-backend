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
        Schema::create('konverteringers', function (Blueprint $table) {
            $table->id();
            $table->integer('romertall_id');
            $table->string('romertall');
            $table->string('integertall');
            $table->dateTime('opprettet_kl');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konverteringers');
    }
};
