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
<<<<<<<< HEAD:database/migrations/2022_12_30_104714_create_colors_table.php
        Schema::create('colors', function (Blueprint $table) {
========
        Schema::create('top__center_menus', function (Blueprint $table) {
>>>>>>>> 6a89ec9c990e9f1d67c65b8f22e81888cea4f908:database/migrations/2022_12_29_072849_create_top__center_menus_table.php
            $table->id();
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
<<<<<<<< HEAD:database/migrations/2022_12_30_104714_create_colors_table.php
        Schema::dropIfExists('colors');
========
        Schema::dropIfExists('top__center_menus');
>>>>>>>> 6a89ec9c990e9f1d67c65b8f22e81888cea4f908:database/migrations/2022_12_29_072849_create_top__center_menus_table.php
    }
};
