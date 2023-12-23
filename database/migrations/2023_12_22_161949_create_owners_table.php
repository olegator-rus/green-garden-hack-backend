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
        Schema::create('owners', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('name')
                ->comment('Название компании');

            $table->string('alias')
                ->comment('Алиас названия компании (сокращенное)');

            $table->string('hex', 7)
                ->nullable()
                ->default("#FFFFFF")
                ->comment('HEX-код цвета компании');

            $table->integer('external_owner_id')
                ->nullable()
                ->comment('Внешний идентификатор компании');

            $table->string('dolgostoy_value', 4)
                ->comment('Долгостой, сут. (порожний/груженый)');

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};
