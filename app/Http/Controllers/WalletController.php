<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Http\Requests\StoreWalletRequest;
use App\Http\Requests\UpdateWalletRequest;
use App\Services\Wallet\WalletServiceInterface;

class WalletController extends Controller
{

    public function __construct(
        protected WalletServiceInterface $walletService
    )
    {
        
    }

    public function index()
    {
        
    }

    public function create()
    {
        //
    }

    public function store(StoreWalletRequest $request)
    {
        //
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
