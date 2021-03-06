<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            // photo id と合わせるので「uuid」
            $table->uuid('photo_id');
            // user id と合わせる
            // 「$table->id()」の場合は「bigIncrements」 または 「unsignedBigInteger」
            $table->unsignedBigInteger('user_id');
            $table->text('content');
            $table->timestamps();

            // 外部キーの設定
            $table->foreign('photo_id')->references('id')->on('photos');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
