<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFooterTarnslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('footer_id')->unsigned();
            $table->string('content');
            $table->string('locale')->index();

            $table->unique(['footer_id','locale']);
            $table->foreign('footer_id')->references('id')->on('footers')->onDelete('cascade');        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('footer_translations');
    }
}
