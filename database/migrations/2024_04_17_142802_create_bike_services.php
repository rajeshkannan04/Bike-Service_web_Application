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
        Schema::create('bike_services', function (Blueprint $table) {
            $table->id();
            $table->string('bookingDate');
            $table->string('deliverDate');
            $table->string('bikebrand');
            $table->string('bikemodel');
            $table->string('city');
            $table->foreignId('users_id')->constrained()->onDelete('cascade');
            $table->foreignId('shop_owners_id')->constrained()->onDelete('cascade');
            $table->string('service1')->nullable();
            $table->string('service2')->nullable();
            $table->string('service3')->nullable();
            $table->string('service4')->nullable();
            $table->string('service5')->nullable();
            $table->string('aditional')->nullable();
            $table->string('rate1')->nullable();
            $table->string('rate2')->nullable();
            $table->string('rate3')->nullable();
            $table->string('rate4')->nullable();
            $table->string('rate5')->nullable();
            $table->string('rate6')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bick_services');
    }
};
