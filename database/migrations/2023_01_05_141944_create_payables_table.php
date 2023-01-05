<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('payables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expenses_id')->constrained('expenses');
            $table->date('due_date');
            $table->string('history')->nullable(false);
            $table->decimal('value', 12, 2)->default(0.0);
            $table->decimal('paid', 12, 2)->default(0.0);
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
        Schema::dropIfExists('payables');
    }
};
