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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Связь с таблицей users
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Связь с таблицей products
            $table->integer('quantity')->default(1); // Количество товара в корзине
            $table->timestamps();
        
            $table->unique(['user_id', 'product_id']); // Один и тот же товар не может быть добавлен в корзину одного пользователя несколько раз
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
