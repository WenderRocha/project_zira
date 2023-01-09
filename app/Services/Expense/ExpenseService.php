<?php

declare(strict_types=1);

namespace App\Services\Expense;

use App\Models\User;
use App\Models\Expense;
use App\Services\Expense\ExpenseServiceInterface;

class ExpenseService implements ExpenseServiceInterface
{
    public function find(int $id)
    {
      return Expense::find($id);
    }

    public function findAll()
    {
        return Expense::all();
    }

    public function create(array $data)
    {
        if(Expense::create($data)) {
            return redirect()->route('expense.index');
        }

        return redirect()->back()->withErrors([
            'message' => 'Oops! tente novamente mais tarde'
        ]);
    }

    public function update(int $id, $data)
    {

        if(Expense::find($id)->update($data)) {
            return redirect()->route('expense.index');
        }
    }

    public function delete(int $id)
    {
        if(Expense::find($id)->delete()) {
            return redirect()->route('expense.index');
        }

    }

    public function getExpenseByUser(User $user, $expense_id)
    {
        return $user->expenses->where('id', $expense_id)->first();
    }

    public function getAllExpensesByUser(User $user)
    {
      return $user->expenses;
    }
}
