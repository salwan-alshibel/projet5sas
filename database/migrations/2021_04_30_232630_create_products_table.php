<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->foreignId('user_id')->constrained('users');
            $table->string('title', 75);
            $table->string('metaTitle', 100);
            $table->string('slug', 100);
            $table->text('summary');
            $table->smallInteger('type');
            $table->string('sku', 100);
            $table->decimal('price')->default(0);
            $table->decimal('discount')->default(0);
            $table->smallInteger('quantity')->default(0);
            $table->tinyInteger('shop')->default(0);
            $table->timestamps();
            $table->timestamp('published_at');
            $table->timestamp('starts_at');
            $table->timestamp('ends_at');
            $table->text('content');
            $table->smallInteger('sellQuantity')->default(0);

            
            // Id :	The unique id to identify the product.
            // Users Id :	The user id to identify the admin or vendor.
            // Title :	The product title to be displayed on the Shop Page and Product Page.
            // Meta Title :	The meta title to be used for browser title and SEO.
            // Slug :	The slug to form the URL.
            // Summary 	:The summary to mention the key highlights.
            // Type :	The type to distinguish between the different product types.
            // SKU :	The Stock Keeping Unit to track the product inventory.
            // Price 	:The price of the product.
            // Discount :	The discount on the product.
            // Quantity :	The available quantity of the product.
            // Shop :	It can be used to identify whether the product is publicly available for shopping.
            // Created At :	It stores the date and time at which the product is created.
            // Updated At :	It stores the date and time at which the product is updated.
            // Published At :	It stores the date and time at which the product is published on the Shop.
            // Starts At :	It stores the date and time at which the product sale starts.
            // Ends At :	It stores the date and time at which the product sale ends.
            // Content 	:The column used to store the additional details of the product.
            // SellQuantity : Sell Quantity.
            
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
}
