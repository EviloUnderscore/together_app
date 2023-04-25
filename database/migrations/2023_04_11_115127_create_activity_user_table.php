<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityUserTable extends Migration
{
    public function up()
    {
        Schema::create('activity_user', function (Blueprint $table) {
            $table->unsignedBigInteger('activity_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('isCreator')->default(false); // Add boolean if user is the creator = true

            // Define foreign keys
            $table->foreign('activity_id')->references('id')->on('activities');
            $table->foreign('user_id')->references('id')->on('users');

            // Add primary key
            $table->primary(['activity_id', 'user_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('activity_user');
    }
}
