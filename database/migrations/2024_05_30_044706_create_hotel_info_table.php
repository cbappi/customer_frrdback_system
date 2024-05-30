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
        Schema::create('hotel_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();
            $table->string('hotel_name',50);
            $table->text('hotel_description');
            $table->longText('hotel_amenities');
            $table->string('hotel_type');
            $table->longText('room_feature');
            $table->text('room_type');
            $table->decimal('start_room_price', 8, 2);
            $table->decimal('last_room_price', 8, 2);

            $table->integer('discount');
            $table->string('country',50);
            $table->string('district',50);
            $table->text('address');
            $table->string('website',150);
            $table->string('email',50);
            $table->string('phone',50);
            $table->string('image_one',150);
            $table->string('image_two',150);
            $table->string('image_three',150);
            $table->string('image_four',150);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_info');
    }
};
