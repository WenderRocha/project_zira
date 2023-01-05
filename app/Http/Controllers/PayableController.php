<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Payable;
use App\Http\Requests\StorePayableRequest;
use App\Http\Requests\UpdatePayableRequest;

class PayableController extends Controller
{

    public function index()
    {
        return Inertia::render('App/Finance/Payable/Index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePayableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePayableRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payable  $payable
     * @return \Illuminate\Http\Response
     */
    public function show(Payable $payable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payable  $payable
     * @return \Illuminate\Http\Response
     */
    public function edit(Payable $payable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePayableRequest  $request
     * @param  \App\Models\Payable  $payable
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePayableRequest $request, Payable $payable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payable  $payable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payable $payable)
    {
        //
    }
}
