<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('icon')->default('UtensilsCrossed');
            $table->boolean('has_images')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_categories');
    }
};
