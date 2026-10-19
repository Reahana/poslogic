<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->integer('parent_id')->default('0');
            $table->string('image')->default('public/uploads/category/default.png');
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->tinyInteger('status');
            $table->string('image_alt')->nullable();
            $table->string('h1_title')->nullable();
            $table->string('focus_keyword', 150)->nullable();
            $table->text('secondary_keywords')->nullable();
            $table->longText('page_content')->nullable();
            $table->string('meta_robots', 50)->default('index,follow');
            $table->string('canonical_url')->nullable();
            $table->string('og_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
