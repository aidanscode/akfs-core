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
            $table->foreignId('creator_id');
            $table->foreignId('category_id');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id');
            $table->foreignId('thread_id');
            $table->string('title');
            $table->longText('body')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
            $table->foreignId('forum_id');
            $table->string('name');
            $table->foreignId('category_id');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rank_id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('timezone');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('forums');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('ranks');
        Schema::dropIfExists('threads');
        Schema::dropIfExists('users');
    }

};