<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charges', function (Blueprint $table) {
            $table->id();
//            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('booking_id');
            $table->unsignedInteger('minibar')->nullable();
            $table->unsignedInteger('laundry')->nullable();
            $table->unsignedInteger('restaurant')->nullable();
            $table->unsignedInteger('fine')->nullable();
            $table->unsignedInteger('other')->nullable();
            $table->unsignedInteger('total')->nullable();
            $table->boolean('is_received')->default(0);;
            $table->boolean('is_submitted')->default(0);;

            $table->timestamps();

            $table->foreign('booking_id')
                ->references('id')
                ->on('bookings')
                ->onDelete('cascade');

//            $table->foreign('admin_id')
//                ->references('id')
//                ->on('admins')
//                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charges');
    }
}
