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
        Schema::create('testimonials', function (Blueprint $table) {

            $table->id();
            $table->string('client_name');
            $table->string('client_slug');
            $table->string('client_designation');
            $table->longText('client_msg');
            $table->string('client_img')->nullable()->default('default-client.jpg');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
