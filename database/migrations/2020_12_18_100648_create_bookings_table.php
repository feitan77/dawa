<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('admin_id');
            $table->string('name')->default('guest');
            $table->string('number_of_guests')->default('1');
            $table->unsignedInteger('price')->nullable();
            $table->boolean('is_received');
            $table->boolean('is_submitted')->default(0);
            $table->enum('status', ['confirmed', 'reserved', 'busy'])->default('confirmed');
            $table->date('check_in')->nullable();
            $table->date('checkout')->nullable();
            $table->timestamps();

            $table->foreign('room_id')
                ->references('id')
                ->on('rooms')
                ->onDelete('cascade');

            $table->foreign('admin_id')
                ->references('id')
                ->on('admins')
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('bookings');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

    }
}
