<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPopulartColumnInPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->boolean('mark_as_popular')->after('is_draft')->default(false);
            $table->boolean('mark_as_latest')->after('is_draft')->default(false);
            $table->boolean('show_in_category')->after('is_draft')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('mark_as_popular');
            $table->dropColumn('mark_as_latest');
            $table->dropColumn('show_in_category');
        });
    }
}
