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
            $table->id(); // شماره یادداشت (خودکار)
            $table->integer('user_id'); // شماره کاربر
            $table->string('title'); // عنوان یادداشت
            $table->text('body'); // متن یادداشت
            $table->timestamps(); // تاریخ ایجاد و آپدیت
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
