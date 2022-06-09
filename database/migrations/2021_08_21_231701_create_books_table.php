<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('author_firstname')->nullable();
            $table->string('author_lastname')->nullable();
            $table->string('isbn')->nullable();
            $table->string('isbn13')->nullable();
            $table->float('rating')->nullable();
            $table->float('average_rating')->nullable();
            $table->string('publisher')->nullable();
            $table->integer('num_pages')->nullable();
            $table->integer('year_published')->nullable();
            $table->integer('year_published_original')->nullable();
            $table->date('date_read')->nullable();
            $table->date('date_added')->nullable();
            $table->set('main_shelf',['read','to-read','currently-reading','abandoned'])->nullable();
            $table->text('review')->nullable();
            $table->text('notes')->nullable();
            $table->integer('read_count')->nullable();
            $table->string('recommended_by')->nullable();
            $table->timestamps();
        });

        Schema::create('shelves', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('alias');
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
        Schema::dropIfExists('books');
        Schema::dropIfExists('shelves');
    }
}
