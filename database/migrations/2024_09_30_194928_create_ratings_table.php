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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            // `webinar_id`, `user_id`, `creator_id`, `rate`
            $table->foreignId('order_id')->constrained('orders');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('creator_id')->constrained('users');
            $table->tinyInteger('professionalism_in_dealing')->default(1);
            $table->tinyInteger('communication_and_follow_up')->default(1);
            $table->tinyInteger('quality_of_work_delivered')->default(1);
            $table->tinyInteger('experience_in_the_project_field')->default(1);
            $table->tinyInteger('delivery_on_time')->default(1);
            $table->tinyInteger('deal_with_him_again')->default(1);
            $table->tinyInteger('rate');
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
