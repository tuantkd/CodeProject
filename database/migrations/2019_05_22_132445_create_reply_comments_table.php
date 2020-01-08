<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_comments', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_comment_fk')->nullable();
            $table->foreign('id_comment_fk')
            ->references('id')->on('comments')->onDelete('cascade');

            $table->integer('id_user_fk')->nullable();
            $table->foreign('id_user_fk')
            ->references('id')->on('users')->onDelete('cascade');

            $table->integer('id_document_fk')->nullable();
            $table->foreign('id_document_fk')
            ->references('id')->on('documents')->onDelete('cascade');

            $table->integer('id_image_fk')->nullable();
            $table->foreign('id_image_fk')
            ->references('id')->on('document_images')->onDelete('cascade');

            $table->integer('id_video_fk')->nullable();
            $table->foreign('id_video_fk')
            ->references('id')->on('document_videos')->onDelete('cascade');
            
            $table->longText('content_reply');

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
        Schema::dropIfExists('reply_comments');
    }
}
