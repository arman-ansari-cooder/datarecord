<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('insert', function (Blueprint $table) {
      $table->id();
     $table->string('custom_id')->nullable();
    $table->date('date');
    $table->string('fullname');
    $table->string('address');
    $table->string('photo')->nullable();
    $table->decimal('total_price', 10, 2);
    $table->string('room_no');
    $table->enum('status', ['active', 'inactive']);
          $table->longText('food_name')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insert');
    }
};
