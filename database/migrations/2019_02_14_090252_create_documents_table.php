<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_file')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_cover_image')->nullable();
            $table->longText('content')->nullable();
            $table->string('file_size')->nullable();
            $table->string('kind')->nullable();

            $table->integer('id_user_fk')->nullable();
            $table->foreign('id_user_fk')
            ->references('id')->on('users')->onDelete('cascade');

            $table->string('publish')->nullable(); //xuất bản
            $table->string('author')->nullable(); //tác giả
            $table->string('source')->nullable(); //nguồn
            $table->integer('total_view')->nullable();
            $table->string('total_download')->nullable();
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
        Schema::dropIfExists('documents');
    }
}
