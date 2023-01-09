<?php

namespace App\Http\Controllers;

use App\Services\Expense\ExpenseServiceInterface;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Expense;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;

class ExpenseController extends Controller
{

    public function __construct(
        protected ExpenseServiceInterface $expenseService
    )
    {
    }

    public function index()
    {
        $user = Auth::user();

        $expenses = $this->expenseService->getAllExpensesByUser($user);
        return Inertia::render('App/Finance/Expense/Index', [
            'expenses' =>  $expenses
        ]);
    }

    public function store(StoreExpenseRequest $request)
    {
        return $this->expenseService->create($request->all());
    }


    public function edit(int $id)
    {
        $user = Auth::user();
        $expense = $this->expenseService->getExpenseByUser($user, $id);
        $expenses = $this->expenseService->getAllExpensesByUser($user);

        return Inertia::render('App/Finance/Expense/Index', [
            'expense' => $expense,
            'expenses' => $expenses,
            'showEditModal' => true
        ]);
    }

    public function update(UpdateExpenseRequest $request, int $id)
    {
        return $this->expenseService->update($id, $request->all());
    }

    public function destroy(int $id)
    {
        return $this->expenseService->delete($id);
    }
}
