<?php

declare(strict_types=1);

namespace App\Services\Expense;

use App\Models\User;


interface ExpenseServiceInterface
{
    public function find(int $id);

    public function findAll();

    public function create(array $data);

    public function update(int $id, $data);

    public function delete(int $id);

    public function getExpenseByUser(User $user, $revenue_id);

    public function getAllExpensesByUser(User $user);


}
