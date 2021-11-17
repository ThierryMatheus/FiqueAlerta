<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesComplaintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_complaint', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('categories_id')
                  ->constrained('categories');
            $table->foreignId('complaint_id')
                  ->constrained('complaint');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_complaint');
    }
}
