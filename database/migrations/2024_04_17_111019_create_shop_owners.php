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
        Schema::create('shop_owners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained()->onDelete('cascade');
            $table->string('shopName');
            $table->string('address');
            $table->string('city');
            $table->string('service1')->nullable();
            $table->string('rate1')->nullable();
            $table->string('service2')->nullable();
            $table->string('rate2')->nullable();
            $table->string('service3')->nullable();
            $table->string('rate3')->nullable();
            $table->string('service4')->nullable();
            $table->string('rate4')->nullable();
            $table->string('service5')->nullable();
            $table->string('rate5')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_owners');
    }
};
