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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category'); // classic, diabetic, snacks
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->string('image')->default('default.jpg');
            $table->string('pack_size')->default('single'); // single, tin, bulk
            $table->boolean('is_on_sale')->default(false);
            $table->integer('popularity')->default(0);
            $table->float('rating')->default(5.0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
