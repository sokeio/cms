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
            $table->string('name', 255);
            $table->string('slug', 500);
            $table->string('description', 400)->nullable()->default('');
            $table->longText('content');
            $table->integer('author_id');
            $table->string('status', 60)->default('published');
            $table->string('image', 255)->nullable();
            $table->integer('views')->unsigned()->default(0);
            $table->datetime('published_at')->nullable();
            $table->string('lock_password')->nullable();
            $table->string('layout', 255)->nullable();
            $table->string('app_before', 500)->nullable();
            $table->string('app_after', 500)->nullable();
            $table->longText('data')->nullable();
            $table->text('js')->nullable();
            $table->text('css')->nullable();
            $table->text('custom_js')->nullable();
            $table->text('custom_css')->nullable();
            $table->timestamps();
        });
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->string('slug', 500);
            $table->string('description', 400)->nullable();
            $table->longText('content')->nullable();
            $table->string('status', 60)->default('published');
            $table->integer('author_id');
            $table->tinyInteger('is_featured')->unsigned()->default(0);
            $table->string('image', 255)->nullable();
            $table->integer('views')->unsigned()->default(0);
            $table->integer('rate')->unsigned()->default(0);
            $table->string('format_type', 30)->nullable();
            $table->string('layout', 255)->nullable();
            $table->datetime('published_at')->nullable();
            $table->longText('data')->nullable();
            $table->text('js')->nullable();
            $table->text('css')->nullable();
            $table->text('custom_js')->nullable();
            $table->text('custom_css')->nullable();
            $table->timestamps();
        });

        Schema::create('catalogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->string('slug', 500);
            $table->integer('parent_id')->unsigned()->default(0);
            $table->string('description', 400)->nullable();
            $table->string('image', 255)->nullable();
            $table->integer('views')->unsigned()->default(0);
            $table->string('status', 60)->default('published');
            $table->integer('author_id');
            $table->string('icon', 60)->nullable();
            $table->tinyInteger('order')->default(0);
            $table->tinyInteger('is_featured')->default(0);
            $table->tinyInteger('is_default')->unsigned()->default(0);
            $table->string('layout', 255)->nullable();
            $table->longText('data')->nullable();
            $table->text('js')->nullable();
            $table->text('css')->nullable();
            $table->text('custom_js')->nullable();
            $table->text('custom_css')->nullable();
            $table->timestamps();
        });
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('slug', 500);
            $table->string('image', 255)->nullable();
            $table->integer('views')->unsigned()->default(0);
            $table->integer('author_id');
            $table->string('author_type', 255)->default(addslashes(User::class));
            $table->string('description', 400)->nullable()->default('');
            $table->string('status', 60)->default('published');
            $table->timestamps();
        });
        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();
            $table->integer('tag_id')->unsigned()->index();
            $table->integer('post_id')->unsigned()->index();
        });

        Schema::create('post_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->unsigned()->index();
            $table->integer('post_id')->unsigned()->index();
        });
        Schema::create('menu_locations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->json('localtions', 1000);
        });
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->default(0);
            $table->integer('menu_location_id');
            $table->string('name', 255);
            $table->string('link', 500)->nullable();
            $table->string('class_attr', 500)->nullable();
            $table->string('data_component', 500)->nullable();
            $table->longText('data_params')->nullable();
            $table->string('type', 255)->default('custom'); //custom/Post/Page/Catalog/Shortcode
            $table->string('data_id', 255)->nullable();
            $table->integer('order')->default(0);
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('parent_id')->unsigned()->default(0);
            $table->integer('commentable_id');
            $table->string('commentable_type', 255);
            $table->text('content')->nullable();
            $table->string('status', 60)->default('published');
            $table->integer('author_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
        Schema::dropIfExists('menu_locations');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('post_categories');
        Schema::dropIfExists('post_tags');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('catalogs');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('pages');
    }
};
