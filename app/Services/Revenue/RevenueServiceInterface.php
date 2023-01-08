<?php

declare(strict_types=1);

namespace App\Services\Revenue;

use App\Models\User;


interface RevenueServiceInterface
{
    public function find(int $id);

    public function findAll();

    public function create(array $data);

    public function update(int $id, $data);
    
    public function delete(int $id);

    public function getRevenueByUser(User $user, $revenue_id);

    public function getAllRevenuesByUser(User $user);
    

}