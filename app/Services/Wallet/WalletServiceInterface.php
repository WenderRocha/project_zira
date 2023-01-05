<?php

declare(strict_types=1);

namespace App\Services\Wallet;

interface WalletServiceInterface
{
    public function find(int $id);

    public function findAll();

    public function create(array $data);

    public function update(int $id, $data);
    
    public function delete(int $id);
}