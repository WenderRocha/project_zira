<?php

declare(strict_types=1);

namespace App\Services\Wallet;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use App\Services\Wallet\WalletServiceInterface;

class WalletService implements WalletServiceInterface
{

    public function find(int $id)
    {
      return Wallet::find($id);

      //return $user->with('wallets')->get();
    }

    public function findAll()
    {
        return Wallet::all();
    }

    public function create(array $data)
    {
        return Wallet::create($data);
    }

    public function update(int $id, $data)
    {
        return Wallet::find($id)->update($data);
    }
    
    public function delete(int $id)
    {
        return Wallet::find($id)->delete();
    }

    public function getWalletByUser(User $user, $wallet_id)
    {
        return $user->wallets->where('id', $wallet_id)->first();
    }

    public function getAllWalletsByUser(User $user)
    {
      return $user::with('wallets')->get();
    }
}