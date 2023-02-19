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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->unsignedBigInteger('sector_id')->nullable();
            $table->foreign('sector_id')->on('sectors')->references('id')
                ->cascadeOnDelete()->cascadeOnUpdate();

            $table->string('website')->nullable();
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('address');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
