<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToActivitiesTable extends Migration
{
    public function up()
    {
        Schema::table('activities', function (Blueprint $table) {
            // Add a foreign key column 'category_id' referencing the 'id' column in the 'categories' table
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    public function down()
    {
        Schema::table('activities', function (Blueprint $table) {
            // Remove the foreign key column 'category_id'
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
}
