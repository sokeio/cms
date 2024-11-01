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
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('main_id')->nullable();
            $table->string('locale')->nullable();
            $table->string('title', 255);
            $table->string('description', 400)->nullable()->default('');
            $table->longText('content')->nullable();
            $table->string('image', 255)->nullable();
            $table->string('status', 60)->default('published');
            $table->datetime('published_at')->nullable();
            $table->string('password')->nullable();
            $table->string('template', 255)->nullable();
            $table->longText('data')->nullable();
            $table->longText('data_js')->nullable();
            $table->longText('data_css')->nullable();
            $table->longText('custom_js')->nullable();
            $table->longText('custom_css')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->foreign('main_id')->references('id')->on('pages')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
