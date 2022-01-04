<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('cateprod_name')->unique();
            $table->string('cateprod_is_status');
            $table->string('cateprod_meta_keywords');
            $table->string('cateprod_meta_title');
            $table->string('cateprod_meta_desc');
            $table->string('cateprod_meta_url');
            // $table->string('cateprod_parent_id');
            $table->string('cateprod_icon');
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
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('cateprod_icon');
        });
    }
}
