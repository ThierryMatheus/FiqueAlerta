<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('profile_user', 'user_profiles');
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->string('cpf')->change();
            $table->string('cellphone')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->integer('cpf');
            $table->integer('cellphone');
        });
    }
}
