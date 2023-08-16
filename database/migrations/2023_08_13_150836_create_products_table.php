<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {


            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('title')->unique();
            $table->string('slug');
            $table->boolean('is_active')->default(true);
            $table->unsignedMediumInteger('price')->default(0);
            $table->longText('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->unsignedMediumInteger('product_id')->unique();
            $table->unsignedInteger('product_stock')->default(0);
            $table->unsignedInteger('alert_quantiry')->default(1);
            $table->longText('additional_info');
            $table->string('product_img')->default('defaul_img.jpg');
            $table->unsignedSmallInteger('product_rating')->nullable()->default(0);
            $table->timestamps();
            $table->softDeletes();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
