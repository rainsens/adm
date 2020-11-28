<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adm_users', function (Blueprint $table) {
	        $table->bigIncrements('id');
	        $table->string('name')->unique();
	        $table->string('password');
	        $table->string('nickname')->default('AdmUser');
	        $table->string('avatar')->nullable();
	        $table->rememberToken();
	        $table->timestamps();
	        
	        $table->index(['created_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adm_users');
    }
}
