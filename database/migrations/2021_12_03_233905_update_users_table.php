<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->string('google_id')->nullable();
            $table->string('password')->nullable()->change();
            $table->string('fantasy_name')->nullable();
            $table->integer('type')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('cpf')->nullable();
            $table->string('address')->nullable();
            $table->string('cellphone')->nullable();
            $table->date('birthdate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
