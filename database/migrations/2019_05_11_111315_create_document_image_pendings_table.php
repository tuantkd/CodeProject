<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentImagePendingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_image_pendings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_file')->nullable();
            $table->longText('content')->nullable();
            $table->string('kind')->nullable();

            $table->integer('id_user_fk')->nullable();
            $table->foreign('id_user_fk')
            ->references('id')->on('users')->onDelete('cascade');

            $table->string('source')->nullable(); //nguồn
            $table->string('file_name')->nullable();
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
        Schema::dropIfExists('document_image_pendings');
    }
}
