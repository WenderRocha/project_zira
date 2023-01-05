<?php

use App\Enums\AddToTotals;
use App\Enums\Currency;
use App\Enums\IsBinary;
use App\Enums\MainWallet;
use App\Enums\ManagementType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('name');
            $table->decimal('initial_balance', 12, 2)->default(0);
            $table->decimal('balance', 12, 2)->default(0);
            $table->decimal('profit', 12, 2)->default(0);
            $table->decimal('take_profit', 12, 2)->default(5);
            $table->integer('take_percentage')->default(5);
            $table->decimal('stop_loss', 12, 2)->default(3);
            $table->integer('stop_percentage')->default(3);
            $table->string('currency')->default(Currency::BRL->value);
            $table->string('management_type')->default(ManagementType::FIXED->value);
            $table->boolean('add_totals')->default(AddToTotals::YES->value);
            $table->boolean('is_binary')->default(IsBinary::NO->value);
            $table->boolean('is_main')->default(MainWallet::NO->value);
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
        Schema::dropIfExists('wallets');
    }
};
