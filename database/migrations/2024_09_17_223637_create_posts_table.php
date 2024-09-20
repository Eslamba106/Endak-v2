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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->text('notes')->nullable();
            $table->string('price')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();

            $table->string('days_count')->nullable();

            $table->enum('status' , ['open' , 'close','active' , 'inactive' ])->default('active');
            $table->enum('add_order' , ['open' , 'pending' , 'complete' ])->default('open');

            $table->string('from_city')->nullable();
            $table->string('from_neighborhood')->nullable();
            $table->string('city')->nullable();
            $table->string('neighborhood')->nullable();


            $table->string('from_floor')->nullable();
            $table->string('from_house')->nullable();
            $table->string('to_city')->nullable();
            $table->string('to_neighborhood')->nullable();
            $table->string('to_floor')->nullable();
            $table->string('to_house')->nullable();

            $table->string('image')->nullable();

            // not 
            $table->string('video')->nullable();
            $table->string('explain')->nullable();

            $table->string('section')->nullable();
            $table->string('code_number')->nullable();
            $table->string('name')->nullable();
            $table->string('cars')->nullable();
            $table->string('clean')->nullable();
            $table->string('Verion')->nullable();
            $table->string('fixed')->nullable();
            $table->string('fingerprint')->nullable();
            $table->string('camera')->nullable();
            $table->string('type')->nullable();
            $table->string('fire_system')->nullable();
            $table->string('networks')->nullable();
            $table->time('time')->nullable();
            $table->string('gender')->nullable();
            $table->string('food')->nullable();
            $table->date('date')->nullable();
            $table->string('size')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};