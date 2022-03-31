<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NoteTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('note_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();

            $table->foreign('note_id')
                ->references('id')
                ->on('notes')
                ->onDelete('cascade');

            $table->foreign('tag_id')
            ->references('id')
            ->on('tags')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('note_tag');
        
    }
}
