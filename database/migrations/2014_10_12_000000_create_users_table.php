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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')
                ->comment('Имя пользователя');
            $table->string('surname')
                ->nullable()
                ->comment('Фамилия пользователя');
            $table->string('patronymic')
                ->nullable()
                ->comment('Отчество пользователя');
            $table->date('birthday')
                ->nullable()
                ->comment('Дата рождения пользователя');
            $table->text('address')
                ->nullable()
                ->comment('Адрес пользователя');
            $table->string('email', 40)
                ->unique()
                ->comment('Адрес электронной почты пользователя');
            $table->timestamp('email_verified_at')
                ->nullable()
                ->comment('Дата активации аккаунта');
            $table->string('password')
                ->comment('Пароль пользователя');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('users');
        Schema::enableForeignKeyConstraints();
    }
};
