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
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('slug');
            $table->foreignId('category_id')
                    ->constrained('categories')
                    ->cascadeOnDelete();
            $table->string('short_description');
            $table->text('description');
            $table->string('image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('available_today')->default(true);  
            $table->decimal('price',10,2);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
