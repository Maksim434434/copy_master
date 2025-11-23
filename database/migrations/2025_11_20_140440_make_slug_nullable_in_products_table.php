<?php
// database/migrations/2024_01_01_xxxxxx_make_slug_nullable_in_products_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('slug')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('slug')->nullable(false)->change();
        });
    }
};