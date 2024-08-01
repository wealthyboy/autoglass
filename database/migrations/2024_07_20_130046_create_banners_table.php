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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->integer('sort_order')->nullable();
            $table->string('image')->nullable();
            $table->string('col')->nullable();
            $table->string('type')->nullable();
            $table->string('sm_col_width')->nullable();
            $table->string('md_col_width')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('use_text')->default(false);
            $table->string('class')->nullable(true);
            $table->string('img_alt')->default(false);

            $table->integer('mobile_sort_order')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
