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
            $table->id();
            $table->string('title')->unique();
            $table->text('description');
            $table->unsignedBigInteger('post_creator_id');
            $table->string("image")->nullable();
            $table->timestamps();
            $table->foreign('post_creator_id')
            ->cascadeOnDelete()
            ->cascadeOnUpdate()
            ->references('id')
            ->on("post_creators");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {

        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('posts_post_creator_id_foreign');
        });
        Schema::dropIfExists('posts');
    }
};
