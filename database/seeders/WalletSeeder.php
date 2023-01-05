<?php

namespace Database\Seeders;

use App\Enums\Currency;
use App\Enums\ManagementType;
use App\Models\Wallet;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wallet::create([
            'user_id' => 1,
            'name' => 'Quotex',
            'initial_balance' => 100,
            'balance' => 100,
            'profit' => 0,
            'take_profit' => 15,
            'take_percentage' => 0,
            'stop_loss' => 15,
            'stop_percentage' => 0,
            'currency' => Currency::BRL->value,
            'management_type' => ManagementType::FIXED->value,
            'add_totals' => false,
            'is_binary' => false,
            'is_main' => false
        ]);
    }
}
