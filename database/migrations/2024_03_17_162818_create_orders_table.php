<?php

use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('status', [Order::PENDING, Order::RECEIVED, Order::SENT, Order::DELIVERED, Order::CANCELED]);
            $table->enum('envio_type', [1,2]);
            $table->float('shipping_cost');
            $table->float('total');
            $table->json('content');

            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments');

            $table->float('cost');

            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');

            $table->unsignedBigInteger('district_id');
            $table->foreign('district_id')->references('id')->on('districts');

            $table->string('address');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
