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
            $table->enum('name', ['minibar', 'laundry', 'restaurant','fine', 'other']);
            $table->unsignedInteger('price');
            $table->enum('money', ['unpaid', 'green_paid', 'orange_paid'])->default('unpaid');
            $table->boolean('is_submitted')->default(0);
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('booking_id');

            $table->timestamps();

            $table->foreign('booking_id')
                ->references('id')
                ->on('bookings')
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
        Schema::dropIfExists('charges');
    }
}
