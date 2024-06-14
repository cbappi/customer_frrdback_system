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
        Schema::create('book_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_category_id');
       

            $table->foreign('user_id')->references('id')->on('users')
            ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreign('book_category_id')->references('id')->on('book_categories')
            ->cascadeOnUpdate()->restrictOnDelete();


            $table->string('book_name');
            $table->text('book_description');
            $table->string('author');
            $table->string('publisher');
            $table->longText('isbn');
            $table->text('edition');
            $table->decimal('pages');
            $table->decimal('country');
            $table->string('language');
            $table->string('image_one');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_infos');
    }
};
