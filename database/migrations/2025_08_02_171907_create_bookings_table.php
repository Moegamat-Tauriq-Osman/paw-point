<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->foreignId('service_id')->constrained()->onDelete('cascade');
    $table->date('date');
    $table->time('time');
    $table->enum('status', ['pending', 'confirmed', 'completed'])->default('pending'); // updated
    $table->string('name');   // new
    $table->string('email');  // new
    $table->string('phone');  // new
    $table->text('notes')->nullable(); // new
    $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
