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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->integer('category_id'); 
            $table->integer('brand_id')->nullable();
            $table->string('product_code')->unique();
            $table->integer('purchase_price');
            $table->integer('old_price')->nullable();
            $table->integer('new_price');
            $table->integer('stock');
            $table->text('meta_description')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('topsale')->nullable();
            $table->tinyInteger('feature_product')->nullable();
            $table->tinyInteger('campaign_id')->nullable();
            $table->tinyInteger('status');
            $table->string('meta_title')->nullable();
            $table->string('h1_title')->nullable();
            $table->string('model_no', 100)->nullable();
            $table->string('mpn', 100)->nullable();
            $table->string('gtin', 20)->nullable();
            $table->string('warranty', 100)->nullable();
            $table->string('delivery_info')->nullable();
            $table->string('installation_info')->nullable();
            $table->string('service_info')->nullable();
            $table->boolean('call_for_price')->default(0);
            $table->string('availability_status', 20)->nullable();
            $table->text('short_description')->nullable();
            $table->json('specifications')->nullable();
            $table->json('features')->nullable();
            $table->json('benefits')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->string('focus_keyword', 150)->nullable();
            $table->text('secondary_keywords')->nullable();
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
        Schema::dropIfExists('products');
    }
};
