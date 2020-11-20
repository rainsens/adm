<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
	        $table->bigIncrements('id');
	        $table->integer('parent_id')->default(0)->index();
	        $table->integer('order')->default(0);
	        $table->string('name')->nullable();
	        $table->string('icon')->nullable();
	        $table->string('url')->nullable();
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
        Schema::dropIfExists('menus');
    }
}
