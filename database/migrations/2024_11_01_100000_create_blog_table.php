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
            $table->timestamps();
        });

        Schema::create('catalogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parent_id')->unsigned()->default(0);
            $table->unsignedBigInteger('main_id')->nullable();
            $table->string('locale')->nullable();
            $table->string('title', 255);
            $table->string('description', 400)->nullable()->default('');
            $table->string('image', 255)->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('template', 255)->nullable();
            $table->string('template_blog', 255)->nullable();
            $table->longText('custom_js')->nullable();
            $table->longText('custom_css')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('description', 400)->nullable()->default('');
            $table->string('image', 255)->nullable();
            $table->string('template', 255)->nullable();
            $table->string('status', 60)->nullable()->default('published');
            $table->timestamps();
        });
        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();
            $table->integer('tag_id')->unsigned()->index();
            $table->integer('post_id')->unsigned()->index();
        });

        Schema::create('post_catalogs', function (Blueprint $table) {
            $table->id();
            $table->integer('catalog_id')->unsigned()->index();
            $table->integer('post_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_catalogs');
        Schema::dropIfExists('post_tags');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('catalogs');
        Schema::dropIfExists('posts');
    }
};
