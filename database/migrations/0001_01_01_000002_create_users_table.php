<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            //таблица юзуеров + уник логин и хеш пароль + внеш ключ
            $table->id();
            $table->string('login')->unique();
            $table->string('password');
           //+ внеш ключ
            $table->foreignId('role_id')->default(1)->constrained('roles');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('users'); }
};