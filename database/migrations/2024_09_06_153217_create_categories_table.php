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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('category_name')->nullable();
            $table->string('slug')->nullable();
            $table->integer('category_id')->default(0)->nullable();
            $table->integer('thumbnail_id')->nullable();
            $table->integer('category_image')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('icon_class')->nullable();
            $table->tinyInteger('step')->default(0);
            $table->tinyInteger('is_top')->default(0);
            $table->tinyInteger('status')->default(1)->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
