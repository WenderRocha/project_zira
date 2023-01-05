<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Http\Requests\StoreWalletRequest;
use App\Http\Requests\UpdateWalletRequest;
use App\Services\Wallet\WalletServiceInterface;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class WalletController extends Controller
{

    public function __construct(
        protected WalletServiceInterface $walletService
    )
    {
        
    }

    public function index()
    {
        $user = Auth::user();

        //dd($this->walletService->getWalletByUser($user, 1));
        //dd($this->walletService->getAllWalletByUser($user));

       

        return Inertia::render('App/Wallet/Index');
    }


    public function store(StoreWalletRequest $request)
    {
        
    }

    public function show(Wallet $wallet)
    {
        //
    }

    public function edit(Wallet $wallet)
    {
        //
    }

    public function update(UpdateWalletRequest $request, Wallet $wallet)
    {
        //
    }

    public function destroy(Wallet $wallet)
    {
        //
    }
}
