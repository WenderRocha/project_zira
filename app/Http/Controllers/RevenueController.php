<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Revenue;
use App\Http\Requests\StoreRevenueRequest;
use App\Http\Requests\UpdateRevenueRequest;

class RevenueController extends Controller
{


    public function index()
    {
        return Inertia::render('App/Finance/Revenue/Index');
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
     * @param  \App\Http\Requests\StoreRevenueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRevenueRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Revenue  $revenue
     * @return \Illuminate\Http\Response
     */
    public function show(Revenue $revenue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Revenue  $revenue
     * @return \Illuminate\Http\Response
     */
    public function edit(Revenue $revenue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRevenueRequest  $request
     * @param  \App\Models\Revenue  $revenue
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRevenueRequest $request, Revenue $revenue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Revenue  $revenue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Revenue $revenue)
    {
        //
    }
}
