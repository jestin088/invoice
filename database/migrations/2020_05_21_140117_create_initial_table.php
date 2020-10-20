<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email', 255);
            $table->string('password', 255);
            $table->string('role', 20);
            $table->string('avatar');
            $table->rememberToken();
            $table->timestamps();
            $table->unique('email', 'email_unique');
        });

        Schema::create('owner', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('contact_number');
            $table->string('country');
            $table->string('province');
            $table->string('city');
            $table->string('address');
            $table->string('postcode');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        });
        
        Schema::create('customer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('contact_number');
            $table->string('country');
            $table->string('province');
            $table->string('city');
            $table->string('address');
            $table->string('postcode');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        });

        Schema::create('warehouse', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('owner_id');
            $table->string('name');
            $table->string('contact_person');
            $table->string('contact_number');
            $table->string('country');
            $table->string('province');
            $table->string('city');
            $table->string('address');
            $table->string('postcode');
            $table->string('measurement_unit');
            $table->decimal('length', 50, 10);
            $table->decimal('width', 50, 10);
            $table->decimal('height', 50, 10);
            $table->decimal('area', 50, 10);
            $table->decimal('volume', 50, 10);
            $table->tinyInteger('is_verified')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
            
            $table->foreign('owner_id')->references('id')->on('owner')->onDelete('cascade');
        });
        
        Schema::create('item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->string('name');
            $table->string('description');
            $table->string('notes');
            $table->string('user_sku');
            $table->string('admin_sku');
            $table->string('system_sku');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('cascade');
        });

        Schema::create('inventory', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('warehouse_id');
            $table->unsignedBigInteger('item_id');
            $table->integer('initial_quantity');
            $table->integer('available_quantity');
            $table->timestamps();

            $table->foreign('warehouse_id')->references('id')->on('warehouse')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('item')->onDelete('cascade');
        });

        Schema::create('inventory_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('inventory_id');
            $table->integer('quantity_before');
            $table->integer('quantity_change');
            $table->integer('quantity_after');
            $table->string('description');
            $table->timestamps();

            $table->foreign('inventory_id')->references('id')->on('inventory')->onDelete('cascade');
        });
        
        Schema::create('customer_invoice', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('item_id');
            $table->text('remarks')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('item')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_invoice');
        Schema::dropIfExists('inventory_log');
        Schema::dropIfExists('inventory');
        Schema::dropIfExists('item');
        Schema::dropIfExists('warehouse');
        Schema::dropIfExists('customer');
        Schema::dropIfExists('owner');
        Schema::dropIfExists('user');
    }
}
