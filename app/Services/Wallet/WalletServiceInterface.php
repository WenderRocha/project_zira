<?php

declare(strict_types=1);

namespace App\Services\Wallet;

use App\Models\User;

interface WalletServiceInterface
{
    public function find(int $id);

    public function findAll();

    public function create(array $data);

    public function update(int $id, $data);
    
    public function delete(int $id);

    public function getWalletByUser(User $user, $wallet_id);

    public function getAllWalletsByUser(User $user);
}