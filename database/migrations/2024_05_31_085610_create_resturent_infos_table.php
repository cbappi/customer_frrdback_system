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
        Schema::create('resturent_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('resturent_category_id');

            $table->foreign('user_id')->references('id')->on('users')
            ->cascadeOnUpdate()->restrictOnDelete();

            $table->foreign('resturent_category_id')->references('id')->on('resturent_categories')
                ->cascadeOnUpdate()->restrictOnDelete();


            $table->string('resturent_name',50);
            $table->text('resturent_description');
            $table->longText('features');
            $table->text('cuisines');

            $table->text('special_diets');
            $table->text('meals');
            $table->string('discount');
            $table->decimal('price_range_start',8,2);
            $table->decimal('price_range_last',8,2);
            $table->string('open_time');
            $table->string('close_time');
            $table->string('address');
            $table->string('website');
            $table->string('email');
            $table->string('phone');
            $table->string('image_one');
            $table->string('image_two');
            $table->string('image_three');
            $table->string('image_four');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resturent_infos');
    }
};
