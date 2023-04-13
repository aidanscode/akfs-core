<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('forums', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('category_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id');
            $table->foreignId('thread_id')->constrained();
            $table->string('title');
            $table->longText('body')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::create('ranks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('threads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('creator_id');
            $table->foreignId('forum_id')->constrained();
            $table->foreignId('thread_category_id')->constrained();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('creator_id')->references('id')->on('users');
        });

        Schema::create('thread_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('is_user_created');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rank_id')->constrained();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('timezone');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('user_ranks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('rank_id')->constrained()->onDelete('CASCADE');
            $table->boolean('is_display_rank')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('thread_categories');
        Schema::dropIfExists('threads');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('forums');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('user_ranks');
        Schema::dropIfExists('ranks');
        Schema::dropIfExists('users');
    }
};