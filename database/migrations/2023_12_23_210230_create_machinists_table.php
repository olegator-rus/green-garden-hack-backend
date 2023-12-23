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
        Schema::create('machinists', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('name')
                ->comment('Название компании');

            $table->string('locomotive_id')
                ->comment('Название компании');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machinists');
    }
};
