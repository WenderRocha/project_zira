<?php

declare(strict_types=1);

namespace App\Services\Revenue;

use App\Models\User;
use App\Models\Revenue;
use App\Services\Revenue\RevenueServiceInterface;

class RevenueService implements RevenueServiceInterface
{
    public function find(int $id)
    {
      return Revenue::find($id);
    }

    public function findAll()
    {
        return Revenue::all();
    }

    public function create(array $data)
    {
        if(Revenue::create($data)) {
            return redirect()->route('revenue.index');
        }

        return redirect()->back()->withErrors([
            'message' => 'Oops! tente novamente mais tarde'
        ]);
    }

    public function update(int $id, $data)
    {

        if(Revenue::find($id)->update($data)) {
            return redirect()->route('revenue.index');
        }
    }
    
    public function delete(int $id)
    {
        if(Revenue::find($id)->delete()) {
            return redirect()->route('revenue.index');
        }
 
    }

    public function getRevenueByUser(User $user, $revenue_id)
    {
        return $user->revenues->where('id', $revenue_id)->first();
    }

    public function getAllRevenuesByUser(User $user)
    {
      return $user->revenues;
    }
}