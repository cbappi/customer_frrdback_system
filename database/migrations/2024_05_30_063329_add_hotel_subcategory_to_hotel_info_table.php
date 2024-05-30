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
        Schema::table('hotel_info', function (Blueprint $table) {
            $table->unsignedBigInteger('hotel_subcategory')->nullable(); // Add the new column
            $table->foreign('hotel_subcategory')->references('id')->on('hotel_subcategories'); // Add the foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hotel_info', function (Blueprint $table) {
            //
        });
    }
};
