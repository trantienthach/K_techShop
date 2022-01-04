<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('prod_name')->unique();
            $table->string('prod_is_status');
            $table->string('prod_meta_keywords');
            $table->string('prod_meta_title');
            $table->string('prod_short_desc');
            $table->string('prod_meta_desc');
            $table->string('prod_meta_seourl');
            $table->integer('prod_price_current');
            $table->integer('prod_price_old');
            $table->integer('prod_cate_id');
            $table->string('prod_img');
            $table->integer('new');
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
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('prod_icon');
        });
    }
}
