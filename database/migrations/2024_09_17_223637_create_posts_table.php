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
            $table->string('slug')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();

            $table->string('days_count')->nullable();
            $table->string('count')->nullable();

            $table->enum('admin_status' , ['active' , 'inactive' ])->default('active');
            $table->enum('status' , ['open' , 'close','pending' , 'complete' ])->default('open');

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
            $table->string('video')->nullable();
            $table->string('explain')->nullable();
            $table->string('modal')->nullable();
            $table->string('manufacturing_year')->nullable();

            $table->string('section')->nullable();
            $table->string('code_number')->nullable();

            $table->string('name')->nullable();

            $table->string('cars')->nullable();
            $table->string('clean')->nullable();
            $table->string('Verion')->nullable();
            $table->string('weight')->nullable();

            
            $table->string('fixed')->nullable();
            $table->string('fingerprint')->nullable();
            $table->string('camera')->nullable();
            $table->string('type')->nullable();
            $table->string('smart')->nullable();
            $table->string('system_security')->nullable();
            $table->string('fire_system')->nullable();
            $table->string('networks')->nullable();
            $table->time('time')->nullable();
            $table->string('gender')->nullable();
            $table->string('food')->nullable();
            $table->date('date')->nullable();
            $table->string('size')->nullable();
            $table->string('general')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
