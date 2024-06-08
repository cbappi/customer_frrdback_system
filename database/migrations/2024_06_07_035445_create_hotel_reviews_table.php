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
        Schema::create('hotel_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_info_id');

            $table->foreign('hotel_info_id')->references('id')->on('hotel_infos')
                ->cascadeOnUpdate()->restrictOnDelete();


            $table->string('review_title',220);
            $table->text('review_des');
            $table->integer('rating');
            $table->string('gowith',20);
            $table->string('year',15);
            $table->string('name',80);
            $table->string('email',100);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_reviews');
    }
};
