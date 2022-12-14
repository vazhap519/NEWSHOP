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
        Schema::create('featured_brands', function (Blueprint $table) {
            $table->id();
            $table->string('brand_image');
            $table->string('brand_meta_name');
            $table->text('brand_meta_description');
            $table->string('brand_meta_keywoards');
            $table->boolean('brands_status')->default(1);
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
        Schema::dropIfExists('featured_brands');
    }
};
