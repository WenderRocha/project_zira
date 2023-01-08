<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Revenue;
use App\Http\Requests\StoreRevenueRequest;
use App\Http\Requests\UpdateRevenueRequest;
use App\Services\Revenue\RevenueServiceInterface;
use Illuminate\Support\Facades\Auth;

class RevenueController extends Controller
{

    public function __construct(
        protected RevenueServiceInterface $revenueService
    )
    {}

    public function index()
    {
        $user = Auth::user();

        $revenues = $this->revenueService->getAllRevenuesByUser($user);
        return Inertia::render('App/Finance/Revenue/Index', [
            'revenues' => $revenues
        ]);
    }

    public function store(StoreRevenueRequest $request)
    {
        return $this->revenueService->create($request->all());
    }

    public function edit(int $id)
    {
        $user = Auth::user();
        $revenue = $this->revenueService->getRevenueByUser($user, $id);
        $revenues = $this->revenueService->getAllRevenuesByUser($user);

        return Inertia::render('App/Finance/Revenue/Index', [
            'revenue' => $revenue,
            'revenues' => $revenues,
            'showEditModal' => true
        ]);
    }

    public function update(UpdateRevenueRequest $request, int $id)
    {
        return $this->revenueService->update($id, $request->all());
    }

    public function destroy(int $id)
    {
        return $this->revenueService->delete($id);
    }
}
