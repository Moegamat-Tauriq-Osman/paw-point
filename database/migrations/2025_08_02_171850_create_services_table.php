<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
    $table->string('name');
    $table->decimal('price', 8, 2);
    $table->text('description')->nullable(); // new
    $table->string('image')->nullable();     // new
    $table->integer('duration')->nullable(); // new (in minutes)
    $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
}
